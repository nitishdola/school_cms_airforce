@extends('layouts.admin.main')

@section('main_content')
<div class="pagetitle">
  <h1>GALLERIES</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('photo_galleries.index') }}">All Contents</a></li>
      <li class="breadcrumb-item active">Add New</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Content</h5>

          	@if ($errors->any())
            	{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        	 @endif

          	{!! Form::model($content,array('route' => ['content.update', $content_type], 'id' => 'content.update', 'class' => 'form-horizontal bucket-form')) !!}

            <div class="row mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
              <label for="inputText" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => '', 'autocomplete' => 'off']) !!}
              </div>
            </div>
            <div class="row mb-3 {{ $errors->has('sub_content') ? 'has-error' : ''}}">
              <label for="inputText" class="col-sm-2 col-form-label">Sub Content</label>
              <div class="col-sm-10">
                {!! Form::text('sub_content', null, ['class' => 'form-control', 'id' => 'sub_content', 'placeholder' => '', 'autocomplete' => 'off']) !!}
              </div>
            </div>

            <div class="row mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
              <label for="inputText" class="col-sm-2 col-form-label">Gallery Event Date</label>
              <div class="col-sm-10">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'placeholder' => '', 'rows' => 5, 'required' => true, 'autocomplete' => 'off']) !!}
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>
</section>

@stop

@section('pageJs')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
        ClassicEditor
                .create( document.querySelector( '#content' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
@stop

@section('pageCss')
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@stop