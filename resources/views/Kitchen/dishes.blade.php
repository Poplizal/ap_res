@extends('layouts.master')
@section('content')
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes In The Kitchen</h3>
                <a href="/dishes/create" class="btn btn-success float-right" >Create</a>
              </div>

              @if (session('stored_dish'))
       <div class="alert alert-success">
             {{ session('stored_dish') }}
              </div>
              @endif 
              @if (session('updated_dish'))
       <div class="alert alert-success">
             {{ session('updated_dish') }}
              </div>
             @endif 

              @if (session('deleted_dish'))
       <div class="alert alert-success">
             {{ session('deleted_dish') }}
              </div>
            @endif 
  
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Actions</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dishes as $dish)
                  <tr>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->Categories->name}}
                    </td>
                    <td>{{$dish->created_at}}</td>
                    <td>
                      <div class="d-flex just-content-center">
                      <div class="mx-1">  <a href="/dishes/{{$dish->id}}/edit" class="btn btn-warning">Edit</a></div>
                      <div class="mx-1">  
                      <form action="/dishes/{{$dish->id}}" method="post">
                      @csrf
                      @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" >Delete</button>
                      </form>
                    </div>
                    </div>
                    </td>
                  
                  </tr>
                  @endforeach 
                  
                  </tfoot>
                </table>
              </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

@endsection