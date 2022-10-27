<?php

namespace App\Http\Controllers\Admin\PhotoGallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PhotoGallery;
use App\Models\Admin\PhotoGalleryImage;
use Crypt, DB, Redirect;

class PhotoGalleryImageController extends Controller
{
    public function create($gallery_id) {
        $gallery = PhotoGallery::find(Crypt::decrypt($gallery_id));
        return view('admin.photo_galleries.images.create', compact('gallery_id', 'gallery'));
    }

    public function store(Request $request)
    {   
        $gallery_id = Crypt::decrypt($request->gallery_id);
        $request->validate([
            'files'     => 'required',
            'files.*'   => 'mimes:png,jpeg,jpg,gif|max:5120',
        ]);

        

        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $files = [];

                $fileName = 'air_force_school_borjhar_'.time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('assets/uploads/gallery_events/'.$gallery_id), $fileName);
                $files['photo_path'] = $fileName;
                $files['photo_gallery_id'] = $gallery_id;

                PhotoGalleryImage::create($files);
            }
        }

     
        return Redirect::route('photo_galleries.index')->with(['message' => 'Photo added to Gallery !', 'alert-class' => 'alert-success']);
    }
}
