<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImageUploadController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $imageUploads = $user->imageUploads;
        return view('imageuploads.index', compact('imageUploads'));
    }

   
    public function create()
    {
        return view('imageuploads.create');
    }

   
   
    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required',
            'mime_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);
    
        $user = Auth::user();
    
        $imageData = file_get_contents($request->file('image')->getRealPath());
    
        $imageUpload = new ImageUpload([
            'filename' => $request->filename,
            'mime_type' => $request->mime_type,
            'image_data' => $imageData,
        ]);
    
        $user->imageUploads()->save($imageUpload);
    
        return redirect()->route('imageuploads.index')
                         ->with('success', 'Image uploaded successfully.');
    }
    
    
      
      
  
        public function update(Request $request, ImageUpload $imageUpload)
        {
            $request->validate([
                'filename' => 'required',
                'mime_type' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            ]);
        
            if ($request->hasFile('image')) {
                // Delete the old image
                Storage::delete('public/images/' . $imageUpload->filename);
        
                // Upload the new image
                $imagePath = $request->file('image')->store('public/images');
                $imageName = basename($imagePath);
        
                $imageUpload->update([
                    'filename' => $request->filename,
                    'mime_type' => $request->mime_type,
                    'image_data' => file_get_contents($request->file('image')->getRealPath()), // Save the new image data in the database
                ]);
            } else {
                $imageUpload->update([
                    'filename' => $request->filename,
                    'mime_type' => $request->mime_type,
                ]);
            }
        
            return redirect()->route('imageuploads.index')->with('success', 'Image upload updated successfully.');
        }
        
    
    public function edit(ImageUpload $imageUpload)
    {
        return view('imageuploads.edit', compact('imageUpload'));
    }

   
    

    public function destroy(ImageUpload $imageUpload)
    {
        $imageUpload->delete();

        return redirect()->route('imageuploads.index')
                         ->with('success','Image upload deleted successfully.');
    }


}
