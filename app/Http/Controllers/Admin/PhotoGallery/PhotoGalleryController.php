<?php

namespace App\Http\Controllers\Admin\PhotoGallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PhotoGallery;
use DB, Redirect, Crypt;
class PhotoGalleryController extends Controller
{
    public function index() {
        $results = PhotoGallery::where('gallery_status', 1)->
            select(
                    'id', 'name', 'location', 'gallery_date'
                )
            ->orderBy('created_at', 'DESC')->get();

        return view('admin.photo_galleries.index', compact('results'));
    }

    public function create() {
        return view('admin.photo_galleries.create');   
    }

    public function store(Request $request) {

        request()->validate([
            'name'   => 'required',
            'location' => 'required',
            'gallery_date' => 'required|date|date_format:Y-m-d'
        ]);

        $data = $request->all();

        if(PhotoGallery::create($data)) {
            return Redirect::route('photo_galleries.index')->with(['message' => 'Gallery added successfully !', 'alert-class' => 'alert-success']);
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $phooto_gallery = PhotoGallery::find($id);
        return view('admin.photo_galleries.edit', compact('phooto_gallery'));   
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'   => 'required',
            'location' => 'required',
            'gallery_date' => 'required|date|date_format:Y-m-d'
        ]);
        $id = Crypt::decrypt($id);
        $phooto_gallery = PhotoGallery::find($id);
        $data = $request->all();
        $phooto_gallery->fill($data);
        $phooto_gallery->save();

        return Redirect::route('photo_galleries.index')->with(['message' => 'Gallery updated successfully !', 'alert-class' => 'alert-success']);
    }

    public function disable($id)
    {
        $id = Crypt::decrypt($id);
        $phooto_gallery = PhotoGallery::find($id);
        $phooto_gallery->gallery_status = false;
        $phooto_gallery->save();

        return Redirect::route('photo_galleries.index')->with(['message' => 'Gallery removed successfully !', 'alert-class' => 'alert-success']);
    }
}
