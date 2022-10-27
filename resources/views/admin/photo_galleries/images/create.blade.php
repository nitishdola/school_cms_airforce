@extends('layouts.admin.main')

@section('main_content')
<div class="pagetitle">
  <h1><strong><u>{{ $gallery->name }}</u></strong></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('photo_galleries.index') }}">All Photo Galleries</a></li>
      <li class="breadcrumb-item active">Add New</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Gallery Images : <strong><u>{{ $gallery->name }}</u></strong></h5>

          	@if ($errors->any())
            	{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        	@endif

          	{!! Form::open(array('route' => 'photo_galleries.images.store', 'id' => 'photo_galleries_images_store', 'files' => true, 'class' => 'form-horizontal bucket-form')) !!}

            

            @php
            for($i = 1; $i <= 10; $i++){
            @endphp
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Image {{ $i }}</label>
              <div class="col-sm-8">
                <input
                    type="file" 
                    name="files[]" 
                    id="inputFile"
                    multiple 
                    class="form-control @error('files') is-invalid @enderror"
                >
              </div>
            </div>
            @php
            }
            @endphp
            <input type="hidden" name="gallery_id" value="{{ $gallery_id }}">
            <div class="row mb-3">
              <label class="col-sm-4 col-form-label"></label>
              <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>
</section>

@stop