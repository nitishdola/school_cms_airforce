<div class="row mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
  <label for="inputText" class="col-sm-4 col-form-label">Gallery Event Name</label>
  <div class="col-sm-8">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '', 'required' => true, 'autocomplete' => 'off']) !!}
  </div>
</div>
<div class="row mb-3 {{ $errors->has('location') ? 'has-error' : ''}}">
  <label for="inputText" class="col-sm-4 col-form-label">Gallery Event Location</label>
  <div class="col-sm-8">
    {!! Form::text('location', 'Air Force School, Borjhar', ['class' => 'form-control', 'id' => 'location', 'placeholder' => '', 'required' => true, 'autocomplete' => 'off']) !!}
  </div>
</div>

<div class="row mb-3 {{ $errors->has('gallery_date') ? 'has-error' : ''}}">
  <label for="inputText" class="col-sm-4 col-form-label">Gallery Event Date</label>
  <div class="col-sm-8">
    {!! Form::date('gallery_date', null, ['class' => 'form-control', 'id' => 'gallery_date', 'placeholder' => '', 'required' => true, 'autocomplete' => 'off']) !!}
  </div>
</div>
