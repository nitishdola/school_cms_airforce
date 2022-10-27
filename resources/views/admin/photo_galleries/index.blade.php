@extends('layouts.admin.main')

@section('main_content')
<div class="pagetitle">
  <h1>GALLERIES</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('photo_galleries.index') }}">All Photo Galleries</a></li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View all Gallery Event</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $k => $v)
              <tr>
                <th scope="row">{{ $k+1 }}</th>
                <td>{{ $v->name }}</td>
                <td>{{ $v->location }}</td>
                <td>{{ date('d-m-Y', strtotime($v->gallery_date)) }}</td>
                <td>
                  <a href="{{ route('photo_galleries.edit', Crypt::encrypt($v->id)) }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  | 
                  <a href="{{ route('photo_galleries.disable', Crypt::encrypt($v->id)) }}" onclick="return confirm('Are you sure ? This action can\'t be undone')">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                  |
                  <a href="{{ route('photo_galleries.images.create', Crypt::encrypt($v->id)) }}">
                    <i class="fa-solid fa-image"></i>
                  </a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>

@stop

@section('pageCss')
<style>
  .fa-trash { color: #972B0D; }
</style>
@stop