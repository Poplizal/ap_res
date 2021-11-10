@extends('layouts.master')
@section('content')
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes In The Kitchen</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dishes as $dish)
                  <tr>
                    <td>{{$dish->name}}</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  @endforeach 
                  
                  </tfoot>
                </table>
              </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->

@endsection