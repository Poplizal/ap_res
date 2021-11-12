@extends('layouts.master')
@section('content')
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>

              </div>
              @if (session('approve'))
       <div class="alert alert-success">
             {{ session('approve') }}
              </div>
             @endif 
             @if (session('cancel'))
       <div class="alert alert-success">
             {{ session('cancel') }}
              </div>
             @endif 
             @if (session('ready'))
       <div class="alert alert-success">
             {{ session('ready') }}
              </div>
             @endif 
   
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Table Name</th> 
                    <th>status</th>
                    <th>Ordered at</th>
                    <th>Actions</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->Dish->name}}</td>
                    <td>{{$order->Table->name}}</td>
                    <td>{{$status[$order->status]}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                      <div class="d-flex just-content-center">
                      <div class="mx-1">  <a href="/orders/{{$order->id}}/approve" class="btn btn-warning">Approve</a></div>
                      <div class="mx-1">  <a href="/orders/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a></div>
                      <div class="mx-1">  <a href="/orders/{{$order->id}}/ready" class="btn btn-success">Ready</a></div>
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