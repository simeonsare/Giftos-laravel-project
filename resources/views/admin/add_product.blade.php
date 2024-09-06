<!DOCTYPE html>
<html>
  <head>
    
    @include('admin.css')
    <style>
        label{
            width: 150px;
            border-bottom: 2px solid rgb(72, 77, 77);
            color: rgb(136, 131, 131) !important;
        }
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
            <div>
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label> Title </label>
                        <input type="text" name="title" required >
                    </div>
                    <div>
                        <label> Description </label>
                        <textarea name="description" ></textarea>
                    </div>
                    <div>
                        <label> Image </label>
                        <input type="file" name="image" required >
                    </div>
                    <div>
                        <label> Price </label>
                        <input type="text" name="price" required >
                    </div>
                    <div>
                        <label> Category </label>
                        <select name="category">
                        <option value="">Select Category</option>
                        @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>            
                        @endforeach
                         </select>
                        
                    </div>
                    <div>
                        <label> Quantity </label>
                        <input type="text" name="quantity" required >
                    </div>
                    <div>
                      <label> version </label>
                      <input type="text" name="version" required >
                  </div>
                  <div>
                    <label> size </label>
                    <input type="text" name="size" required >
                </div>
                <div>
                  <label> deliverly </label>
                  <select name="delivery" id="">
                    <option value="">select if delivery available</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
              </div>
              <div>
                <label> delivery per Meter </label>
                <input type="text" name="delivery_m"  >
            </div>
            <div>
              <label> Year </label>
              <input type="text" name="year" required >
          </div>
          <div>
            <label> Gallery pic_1 </label>
            <input type="file" name="gallery_1"  >
        </div>
        <div>
          <label> Gallery pic_2 </label>
          <input type="file" name="gallery_2"  >
      </div>
      <div>
        <label> Gallery pic_3 </label>
        <input type="file" name="gallery_3"  >
    </div>
    <div>
      <label> Gallery pic_4 </label>
      <input type="file" name="gallery_4"  >
  </div>
  <div>
    <label> Gallery pic_5 </label>
    <input type="file" name="gallery_5"  >
</div>
<div>
  <label> Gallery pic_6 </label>
  <input type="file" name="gallery_6"  >
</div>
<div>
  <label> Gallery pic_7 </label>
  <input type="file" name="gallery_7" >
</div>
          <div>
            <label> Gallery pic_8 </label>
            <input type="file" name="gallery_8"  >
        </div>
                    <div>
                    <input type="submit" value="Upload Product" class="btn btn-success" style="margin-left: 100px" >
                    </div>
            

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