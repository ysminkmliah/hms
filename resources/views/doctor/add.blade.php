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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title"style="padding-bottom:10px">Add New Doctor</h1>
                                <form class="main-form" action="{{url('upload-doctor')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div style="padding-bottom:10px">
                                        <label style="margin-right:10px; width:20%;">Doctor Name: </label>
                                        <input type="text" style="color:black; width:60%;" name="doctor_name" placeholder="Write name here"/>
                                    </div>
                                    <div style="padding-bottom:10px">
                                        <label style="margin-right:10px; width:20%;">Phone Number: </label>
                                        <input type="text" style="color:black; width:60%;" name="doctor_phone" placeholder="Write phone number here"/>
                                    </div>
                                    <div style="padding-bottom:10px">
                                        <label style="margin-right:10px; width:20%;">Room Number: </label>
                                        <input type="text" style="color:black; width:60%;" name="doctor_room" placeholder="Write room number here"/>
                                    </div>
                                    <div style="padding-bottom:10px">
                                        <label style="margin-right:10px; width:20%;">Department: </label>
                                        <select name="doctor_department" style="color:black; width:30%;" class="custom-select">
                                            <option value="">--Choose Department--</option>
                                            <option value="general">General Health</option>
                                            <option value="cardiology">Cardiology</option>
                                            <option value="dental">Dental</option>
                                            <option value="neurology">Neurology</option>
                                            <option value="orthopaedics">Orthopaedics</option>
                                        </select>
                                    </div>
                                    <div style="padding-bottom:10px">
                                        <label style="margin-right:10px; width:20%;">Doctor Image: </label>
                                        <input type="file" style="width:60%;" name="doctor_image"/>
                                    </div>
                                    <div style="padding-bottom:10px; width:80%;">
                                        <input type="submit" class="btn btn-success float-right"/>
                                    </div>
                                </form> 
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