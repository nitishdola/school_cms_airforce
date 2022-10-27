@extends('layouts.admin.main')

@section('main_content')
<div class="pagetitle">
  <h1>GALLERIES</h1>
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
          <h5 class="card-title">Add a Gallery Event</h5>

          	@if ($errors->any())
            	{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        	@endif

          	{!! Form::open(array('route' => 'photo_galleries.store', 'id' => 'photo_galleries_store', 'class' => 'form-horizontal bucket-form')) !!}

            @include('admin.photo_galleries._form')
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