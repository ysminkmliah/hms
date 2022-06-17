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

            @include('admin.content') 
          
            @include('admin.footer') 

          </div>
        </div>
      </div>
    </div>
  </body>

  @include('admin.script')

</html>