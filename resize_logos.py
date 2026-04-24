from PIL import Image, ImageChops
import os

# Configuration
# Process both directories to be safe as user likely wants all logos consistent
target_dirs = ['public/uploads/partner_logos', 'public/home_new/images/partners'] 

# Hardcoded target dimensions based on ECA logo (1024x469)
TARGET_WIDTH = 1024
TARGET_HEIGHT = 469

def trim(im):
    """
    Trims whitespace from the image.
    Handles transparent backgrounds and white backgrounds.
    """
    bg = Image.new(im.mode, im.size, im.getpixel((0,0)))
    diff = ImageChops.difference(im, bg)
    diff = ImageChops.add(diff, diff, 2.0, -100) # Threshold
    bbox = diff.getbbox()
    if bbox:
        return im.crop(bbox)
    
    # Fallback: if top-left pixel is white (255,255,255), try trimming white Specifically
    # This handles "white box" JPGs saved as PNGs
    if im.mode == 'RGBA':
        # Check alpha channel first
        alpha = im.getchannel('A')
        bbox_alpha = alpha.getbbox()
        if bbox_alpha:
             return im.crop(bbox_alpha)
             
    return im

def process_directory(directory):
    print(f"Processing directory: {directory}")
    if not os.path.exists(directory):
        print(f"Directory not found: {directory}")
        return

    for filename in os.listdir(directory):
        if filename.lower().endswith(('.png', '.jpg', '.jpeg')):
            file_path = os.path.join(directory, filename)
            
            try:
                with Image.open(file_path) as img:
                    img = img.convert("RGBA")
                    
                    # 1. TRIM whitespace (Aggressive)
                    # Create a mask for non-transparent pixels
                    alpha = img.split()[-1]
                    bbox = alpha.getbbox()
                    
                    if bbox:
                        trimmed_img = img.crop(bbox)
                    else:
                        # Fully transparent? Or solid color?
                        # Try trimming based on color difference from corner
                        bg = Image.new(img.mode, img.size, img.getpixel((0,0)))
                        diff = ImageChops.difference(img, bg)
                        bbox_diff = diff.getbbox()
                        if bbox_diff:
                             trimmed_img = img.crop(bbox_diff)
                        else:
                             trimmed_img = img

                    # 2. Resize to fit TARGET box
                    img_ratio = trimmed_img.width / trimmed_img.height
                    target_ratio = TARGET_WIDTH / TARGET_HEIGHT
                    
                    # Calculate new dimensions to MAXIMIZE within target box
                    if img_ratio > target_ratio:
                        # Wider than target
                        new_w = TARGET_WIDTH
                        new_h = int(TARGET_WIDTH / img_ratio)
                    else:
                        # Taller than target
                        new_h = TARGET_HEIGHT
                        new_w = int(TARGET_HEIGHT * img_ratio)
                        
                    resized_img = trimmed_img.resize((new_w, new_h), Image.Resampling.LANCZOS)
                    
                    # 3. Paste into centered canvas
                    new_canvas = Image.new("RGBA", (TARGET_WIDTH, TARGET_HEIGHT), (255, 255, 255, 0))
                    left = (TARGET_WIDTH - new_w) // 2
                    top = (TARGET_HEIGHT - new_h) // 2
                    new_canvas.paste(resized_img, (left, top))
                    
                    # Save
                    new_canvas.save(file_path, "PNG")
                    print(f"Processed: {filename}")
                    
            except Exception as e:
                print(f"Failed to process {filename}: {e}")

for d in target_dirs:
    process_directory(d)

print("Batch processing complete.")
