@extends('layouts.master')
@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes In The Kitchen</h3>
                <a href="/dishes" class="btn btn-secondary float-right" >Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form action="/dishes" method="post" enctype="multipart/form-data">
@csrf
@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" >
  </div>
  @error('category')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category" >
    @foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>   
  </div>
  @error('image')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="image">Image</label>
<input type="file" id="image" name="image" class="form-control" > 
  </div>

  <button type="submit" class="btn btn-primary">Create</button>

</form>

              </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

@endsection