<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
      <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div class="container my-3">    
<div class="row">
          <div class="col-12">
           <h3>Our Menu</h3>
           @if (session('ordered'))
    <div class="alert alert-success">
        {{ session('ordered') }}
    </div>
@endif
@if (session('No_order_yet'))
    <div class="alert alert-warning">
        {{ session('No_order_yet') }}
    </div>
@endif

@if (session('serve'))
       <div class="alert alert-success">
             {{ session('serve') }}
              </div>
             @endif 

          </div>
        </div>
        <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

           
         
<form action="/order_form" method="post">
<div class="row">
    @csrf 
@foreach($dishes as $dish)
    <div class="card col-12 col-sm-6 col-md-4" style="width: 18rem;">
  <img src="{{ asset('/dish_images/'.$dish->image) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$dish->name}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>   
     <input type="number" name={{$dish->id}} class="px-2 form-control" max=10 min=0 >
  </div>
</div>
@endforeach
<div class="row ">
<div class="form-group col-12 col-sm-6">
  
    @error('phoneNo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror 
 <div>
      <input type="text" class="form-control" name="phoneNo" id="phoneNumber" placeholder="phoneNumber">
    </div>
  </div>

  <div class="input-group mb-3 col-12 col-sm-6">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Table</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="table">
      @foreach($tables as $table)
  <option value="{{$table->id}}">{{$table->name}}</option>
@endforeach
  </select>
</div>

  <div class="col-12"><button type="submit" class="btn btn-success">Order</button></div>
</div>
</div>
</form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
        
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>

              </div>

   
  
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Table Name</th> 
                    <th>status</th>
                    <th>Actions</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->Dish->name}}</td>
                    <td>{{$order->Table->name}}</td>
                    <td>{{$status[$order->status]}}</td>
                    <td>
                      <div class="d-flex just-content-center">
                      <div class="mx-1">  <a href="/orders/{{$order->id}}/serve" class="btn btn-warning">Serve</a></div>
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

                  </div>
     
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          </div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>