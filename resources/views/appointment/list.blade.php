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
                            <h1 class="card-title"style="padding-bottom:10px">Appointment List</h1>
                            <div class="container">
                                <br>
                                <h1 class="text-center">Appointment List</h1>
                                <br>
                                <div class="text-center table table-bordered table-responsive">
                                    <table width="100%" style="color:black;">
                                        <tr style="background-color:#89cff0;">
                                            <th>Patient Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Doctor Name</th>
                                            <th>Appointment Date</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                        @foreach ($appointments as $appointment)
                                            <tr style="background-color:white;">
                                                <td>{{ $appointment->first_name }}  {{ $appointment->last_name}}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>Dr. {{ $appointment->doctor->name }} ({{ $appointment->doctor->department }})</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->message }}</td>
                                                <td>{{ $appointment->status }}</td>
                                                <td>
                                                    <a href="{{url('appointment-approve', $appointment->id)}}" class="btn btn-success">Approve</a>
                                                </td>
                                                <td>
                                                    <a href="{{url('appointment-reject', $appointment->id)}}" class="btn btn-danger">Reject</a>
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