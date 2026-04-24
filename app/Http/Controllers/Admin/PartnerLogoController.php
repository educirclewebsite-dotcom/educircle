<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerLogoController extends Controller
{
    /**
     * Display a listing of partner logos
     */
    public function index()
    {
        $partnerLogos = PartnerLogo::all();
        return view('admin.partner_logos.index', compact('partnerLogos'));
    }

    /**
     * Show the form for creating a new partner logo
     */
    public function create()
    {
        // Get the next display order
        $nextOrder = PartnerLogo::max('display_order') + 1;
        return view('admin.partner_logos.create', compact('nextOrder'));
    }

    /**
     * Store a newly created partner logo
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'display_order' => 'required|integer|min:0',
        ]);

        try {
            // Handle file upload
            $logoPath = $this->uploadLogo($request->file('logo'));

            // Create partner logo
            PartnerLogo::create([
                'name' => $request->name,
                'logo_path' => $logoPath,
                'alt_text' => $request->alt_text ?? $request->name,
                'display_order' => $request->display_order,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('partner-logos.index')
                ->with('success', 'Partner logo added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to add partner logo: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified partner logo
     */
    public function edit($id)
    {
        $partnerLogo = PartnerLogo::findOrFail($id);
        return view('admin.partner_logos.edit', compact('partnerLogo'));
    }

    /**
     * Update the specified partner logo
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'display_order' => 'required|integer|min:0',
        ]);

        try {
            $partnerLogo = PartnerLogo::findOrFail($id);

            // Handle logo replacement if new file uploaded
            if ($request->hasFile('logo')) {
                // Delete old logo
                if (File::exists(public_path($partnerLogo->logo_path))) {
                    File::delete(public_path($partnerLogo->logo_path));
                }

                // Upload new logo
                $logoPath = $this->uploadLogo($request->file('logo'));
                $partnerLogo->logo_path = $logoPath;
            }

            // Update other fields
            $partnerLogo->name = $request->name;
            $partnerLogo->alt_text = $request->alt_text ?? $request->name;
            $partnerLogo->display_order = $request->display_order;
            $partnerLogo->is_active = $request->has('is_active');
            $partnerLogo->save();

            return redirect()->route('partner-logos.index')
                ->with('success', 'Partner logo updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update partner logo: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified partner logo
     */
    public function destroy($id)
    {
        try {
            $partnerLogo = PartnerLogo::findOrFail($id);

            // Delete logo file
            if (File::exists(public_path($partnerLogo->logo_path))) {
                File::delete(public_path($partnerLogo->logo_path));
            }

            $partnerLogo->delete();

            return redirect()->route('partner-logos.index')
                ->with('success', 'Partner logo deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete partner logo: ' . $e->getMessage());
        }
    }

    /**
     * Upload logo file and return path
     */
    private function uploadLogo($file)
    {
        // Create directory if it doesn't exist
        $uploadPath = public_path('uploads/partner_logos');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Generate unique filename
        $filename = 'partner_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Move file to upload directory
        $file->move($uploadPath, $filename);

        // Process Image (Resize & Trim)
        try {
            $this->processImage($uploadPath . '/' . $filename);
        } catch (\Exception $e) {
            // If processing fails, keep the original
        }

        return 'uploads/partner_logos/' . $filename;
    }

    /**
     * Process the image: trim whitespace and resize to target dimensions
     */
    private function processImage($filePath)
    {
        // 0. Check for GD Extension
        if (!extension_loaded('gd')) {
            // GD not loaded; skip processing.
            // Ideally should log this or notify, but return early to avoid crash.
            return;
        }

        $targetWidth = 1024;
        $targetHeight = 469;

        if (!File::exists($filePath))
            return;

        // Get image info
        $info = @\getimagesize($filePath);
        if (!$info)
            return;

        $mime = $info['mime'];

        // Create image resource from file
        // Prefix with \ to ensure global function call, though standard functions usually fall back
        // But let's be explicit
        switch ($mime) {
            case 'image/jpeg':
                $image = \imagecreatefromjpeg($filePath);
                break;
            case 'image/png':
                $image = \imagecreatefrompng($filePath);
                \imagealphablending($image, false);
                \imagesavealpha($image, true);
                break;
            case 'image/gif':
                $image = \imagecreatefromgif($filePath);
                break;
            case 'image/webp':
                // Check if function exists (php > 7.4 + gd with webp support)
                if (function_exists('imagecreatefromwebp')) {
                    $image = \imagecreatefromwebp($filePath);
                } else {
                    return;
                }
                break;
            default:
                return; // Unsupported format
        }

        if (!$image)
            return;

        // 1. TRIM Whitespace
        // Try trimming transparent borders first (for PNGs)
        // Check if imagecropauto exists (PHP 5.5+)
        if (function_exists('imagecropauto')) {
            $trimmed = \imagecropauto($image, IMG_CROP_TRANSPARENT);

            // If that didn't do anything or returns false (e.g. for JPGs or solid bg), try trimming white/corner color
            if (!$trimmed) {
                $trimmed = \imagecropauto($image, IMG_CROP_THRESHOLD, 0.5, 16777215); // 16777215 is White
            }

            // Use trimmed image if successful
            if ($trimmed !== false) {
                \imagedestroy($image);
                $image = $trimmed;
            }
        }

        $width = \imagesx($image);
        $height = \imagesy($image);

        // 2. Calculate Resize Dimensions to MAXIMIZE within Target
        $imgRatio = $width / $height;
        $targetRatio = $targetWidth / $targetHeight;

        if ($imgRatio > $targetRatio) {
            // Wider than target
            $newWidth = $targetWidth;
            $newHeight = (int) ($targetWidth / $imgRatio);
        } else {
            // Taller than target
            $newHeight = $targetHeight;
            $newWidth = (int) ($targetHeight * $imgRatio);
        }

        // 3. Create Target Canvas (Transparent)
        $canvas = \imagecreatetruecolor($targetWidth, $targetHeight);
        \imagealphablending($canvas, false);
        \imagesavealpha($canvas, true);
        $transparent = \imagecolorallocatealpha($canvas, 255, 255, 255, 127);
        \imagefilledrectangle($canvas, 0, 0, $targetWidth, $targetHeight, $transparent);

        // 4. Copy and Resize Image onto Canvas (Centered)
        $destX = (int) (($targetWidth - $newWidth) / 2);
        $destY = (int) (($targetHeight - $newHeight) / 2);

        \imagecopyresampled(
            $canvas,
            $image,
            $destX,
            $destY,
            0,
            0,
            $newWidth,
            $newHeight,
            $width,
            $height
        );

        // 5. Save (Overwrite original as PNG for consistency and transparency)
        // If original was JPG, this changes format but keeps extension unless we rename.
        // For simplicity, we'll save/overwrite as the original format IF it supports transparency,
        // otherwise save as PNG?
        // Actually, partner logos should ideally be PNGs.
        // But to avoid file extension mismatch issues with browsers/servers, let's just save back to original format
        // OR save as PNG with correct extension if we can.
        // However, the database already has the filename.
        // If we save a PNG content into a .jpg file, browsers usually handle it fine.
        // Let's force save as PNG content regardless of extension to support transparency.
        \imagepng($canvas, $filePath);

        // Clean up
        \imagedestroy($image);
        \imagedestroy($canvas);

    }
}
