<div class="page-section">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
    <form class="main-form" action="{{url('add-appointment')}}" method="POST">
      @csrf
      <div class="row mt-5 ">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" name="fname" placeholder="First name" required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" class="form-control" name="lname" placeholder="Last Name">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" class="form-control" name="email" placeholder="Email Address" required>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms" required>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="doctor" class="custom-select" required>
            <option value="">--Choose a Doctor--</option>
            @foreach ($doctors as $doctor)
              <option value="{{$doctor->id}}">Dr. {{$doctor->name}} ({{$doctor->department}})</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
    </form>
  </div>
</div>