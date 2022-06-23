<!DOCTYPE html>
<html lang="en">

  <head>
    @include('admin.css') 
  </head>

  <body>
    <div class="container-scroller">

      @include('admin.sidebar')

      @include('admin.navbar')
      
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title"style="padding-bottom:10px">Doctor List</h1>
                            <div class="container">
                                <br>
                                <h1 class="text-center">Doctor List</h1>
                                <br>
                                <div class="text-center table table-bordered table-responsive">
                                    <table width="100%" style="color:black;">
                                        <tr style="background-color:#89cff0;">
                                            <th>Image</th>
                                            <th>Doctor Name</th>
                                            <th>Phone Number</th>
                                            <th>Room Number</th>
                                            <th>Department</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                        @foreach ($doctors as $doctor)
                                            <tr style="background-color:white;">
                                                <td>
                                                    <img src="doctorimage/{{$doctor->image}}"/>
                                                </td>
                                                <td>{{$doctor->name}}</td>
                                                <td>{{$doctor->phone}}</td>
                                                <td>{{$doctor->room}}</td>
                                                <td>{{$doctor->department}}</td>
                                                <td>
                                                    <a href="{{url('doctorupdate', $doctor->id)}}" class="btn btn-primary">Update</a>
                                                </td>
                                                <td>
                                                    <a href="{{url('doctor-delete', $doctor->id)}}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            @include('admin.footer') 

          </div>
        </div>
      </div>
    </div>
  </body>

  @include('admin.script')

</html>