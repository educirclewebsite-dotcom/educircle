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

        return 'uploads/partner_logos/' . $filename;
    }
}
