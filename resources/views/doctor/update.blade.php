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
                            <h1 class="card-title"style="padding-bottom:10px">Update Doctor</h1>
                            
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