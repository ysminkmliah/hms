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

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
      <div class="hero-section">
          <div class="container text-center wow zoomIn">
          <span class="subhead">Let's make your life happier</span>
          <h1 class="display-4">Healthy Living</h1>
          <a href="#" class="btn btn-primary">Let's Consult</a>
          </div>
      </div>
    </div>

    @include('doctor.view')

    @include('user.news')

    @include('appointment.add')

    @include('user.footer') 
  </body>

  @include('user.script')

</html>