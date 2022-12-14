<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_gallery_id',
        'photo_path',
    ];
}
