<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_gallery_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('photo_gallery_id', false, true);
            $table->string('photo_path')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('photo_gallery_id')->references('id')->on('photo_galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_gallery_images');
    }
}
