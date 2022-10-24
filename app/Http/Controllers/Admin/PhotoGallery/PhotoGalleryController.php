<?php

namespace App\Http\Controllers\Admin\PhotoGallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PhotoGallery;

class PhotoGalleryController extends Controller
{
    public function index() {
        $results = PhotoGallery::whereStatus(1)->
            select(
                    'name', 'location', 'gallery_date'
                )
            ->orderBy('created_at', 'DESC')->get();

        return view('admin.photo_galleries.index', compact('results'));
    }

    public function create() {
        return view('admin.photo_galleries.create');   
    }
}
