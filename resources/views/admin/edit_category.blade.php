<!DOCTYPE html>
<html>
  <head>
    
    @include('admin.css')

    <style>

    </style>
</head>
  <body>
    <header class="header"> 
      @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Update Category</h1>
            <div class="div_deg">
                <form action="{{url('update_category',$data->id)}}" method="post">
                    @csrf
                    <input type="text" value="{{$data->category_name}} " name="category">
                    <input type="submit" class="btn btn-success" value="update category">

                </form>
            </div>

   

    </div>
    <!-- JavaScript files-->
    <script src="{{ asset ('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset ('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset ('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset ('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset ('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset ('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset ('admincss/js/front.js')}}"></script>
  </body>
</html>