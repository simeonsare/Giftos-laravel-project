<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .container-fluid {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }
        
        .form-container {
            flex: 1;
            padding-right: 20px;
        }

        .table-container {
            flex: 1;
            padding-left: 20px;
            border-left: 2px solid #ccc; /* Line between form and table */
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .form-group label {
            width: 150px;
            padding-right: 10px;
        }

        .form-group input,
        .form-group select {
            flex: 1;
        }

        .submit-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
            border-top: 2px solid #ccc;
            padding-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        img {
            height: 120px;
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
            <h>Update Product</h>
            <div class="container-fluid">
              <div class="form-container">
                <form action="{{url('update_product',$data->id)}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" value="{{$data->title}}" name="title">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" value="{{$data->price}}" name="price">
                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="text" value="{{$data->quantity}}" name="quantity">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" value="{{$data->description}}" name="description">
                    </div>
                    <div class="form-group">
                      <label> Price </label>
                      <input type="text" name="price" value="{{$data->price}}"required >
                  </div>

          
                  <div class="form-group">
                    <label> version </label>
                    <input type="text" name="version" value="{{$data->version}}"required >
                </div>
                <div class="form-group">
                  <label> size </label>
                  <input type="text" name="size" value="{{$data->size}}"required >
              </div>
              <div class="form-group">
                <label> deliverly </label>
                <select name="delivery" value="{{$data->delivery}}">
                  <option value="">select if delivery available</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
              <label> delivery per Meter </label>
              <input type="text" name="delivery_m" value="{{$data->delivery_m}}" >
          </div>
          <div class="form-group">
            <label> Year </label>
            <input type="text" name="year" value="{{$data->year}}"required >
        </div>
                    
                    <div class="form-group">
                      <label>Current Image</label>
                      <img src="/Products/{{$data->image}}" alt="{{$data->image}}">
                    </div>
                    <div class="form-group">
                      <label>New Image</label>
                      <input type="file" name="image">
                    </div>

                    <div class="submit-container">
                      <input type="submit" class="btn btn-success" value="Update">
                    </div>
             
              </div>

              <div class="table-container">
                <table>
                  <tr>
                    <th>Gallery</th>
                    <th>Current Image</th>
                    <th>New Image</th>
                  </tr>
                  <tr>
                    <td>Gallery 1</td>
                    <td><img src="/Products/{{$data->gallery_1}}" alt="{{$data->gallery_1}}"></td>
                    <td><input type="file" name="gallery_1"></td>
                  </tr>
                  <tr>
                    <td>Gallery 2</td>
                    <td><img src="/Products/{{$data->gallery_2}}" alt="{{$data->gallery_2}}"></td>
                    <td><input type="file" name="gallery_2"></td>
                  </tr>
                  <tr>
                    <td>Gallery 3</td>
                    <td><img src="/Products/{{$data->gallery_3}}" alt="{{$data->gallery_3}}"></td>
                    <td><input type="file" name="gallery_3"></td>
                  </tr>
                  <tr>
                    <td>Gallery 4</td>
                    <td><img src="/Products/{{$data->gallery_4}}" alt="{{$data->gallery_4}}"></td>
                    <td><input type="file" name="gallery_4"></td>
                  </tr>
                  <tr>
                    <td>Gallery 5</td>
                    <td><img src="/Products/{{$data->gallery_5}}" alt="{{$data->gallery_5}}"></td>
                    <td><input type="file" name="gallery_5"></td>
                  </tr>
                  <tr>
                    <td>Gallery 6</td>
                    <td><img src="/Products/{{$data->gallery_6}}" alt="{{$data->gallery_6}}"></td>
                    <td><input type="file" name="gallery_6"></td>
                  </tr>
                  <tr>
                    <td>Gallery 7</td>
                    <td><img src="/Products/{{$data->gallery_7}}" alt="{{$data->gallery_7}}"></td>
                    <td><input type="file" name="gallery_7"></td>
                  </tr>
                  <tr>
                    <td>Gallery 8</td>
                    <td><img src="/Products/{{$data->gallery_8}}" alt="{{$data->gallery_8}}"></td>
                    <td><input type="file" name="gallery_8"></td>
                  </tr>
                </table>
              </div>
            </form>
            </div>
          </div>
        </div>
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
