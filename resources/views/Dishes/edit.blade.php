@extends('layouts.master')
@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes In The Kitchen</h3>
                <a href="/dishes" class="btn btn-secondary float-right" >Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form action="/dishes/{{$dish->id}}" method="post" enctype="multipart/form-data">

@csrf
@method('put')
@error('name')

    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$dish->name)}}">
  </div>
  @error('category')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category" >
    @foreach($categories as $category)
<option value="{{$category->id}}" {{$category->id == $dish->category_id ? "selected" : null}} >{{$category->name}}</option>
    @endforeach
</select>   
  </div>
  @error('image')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="image">Image</label>
       <div class="my-2">
        <img  src="{{ asset('/dish_images/'.$dish->image) }}" alt="image" width="150px" height="80px"></div>

<input type="file" id="image" name="image" class="form-control" > 
  </div>

  <button type="submit" class="btn btn-primary">Update</button>

</form>

              </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

@endsection