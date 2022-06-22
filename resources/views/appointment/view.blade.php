<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
  </head>
  
  <body>
    <div class="back-to-top"></div>

    @include('user.navbar')

    @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
    </div>

    @endif

    <div class="container">
        <br>
        <h1 class="text-center">Appointment List</h1>
        <br>
        <div class="text-center table table-bordered">
            <table width="100%">
                <tr style="background-color:#89cff0;">
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>Dr. {{ $appointment->doctor->name }} ({{ $appointment->doctor->department }})</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->message }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>
                            <a href="{{url('appointment-delete', $appointment->id)}}" class="btn btn-danger">Cancel Appointment</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('user.footer') 
  </body>

  @include('user.script')

</html>