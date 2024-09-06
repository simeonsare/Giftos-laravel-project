<!DOCTYPE html>
<html>
  <head>
    
    @include('admin.css')
    <style>
        th {
            padding: 10px;
            border: solid rgb(67, 95, 95);
            text-align: center;
        }
        tr {
            border-bottom: solid rgb(67, 95, 95);
            border-right: solid rgb(67, 95, 95);
        }
        td {
            border-right: solid rgb(67, 95, 95);
            color: aliceblue;
            text-align: center;
        }
        a {
            margin: 20px;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            min-width: 1200px; /* Ensures table doesn't collapse too much */
            border-collapse: collapse;
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
            <form style="padding:20px" action="{{url('product_search')}}" method="post">
              @csrf
              <input type="search" name="search">
              <input class="btn btn-secondary" type="submit" value="search">
            </form>
         
            <div class="table-container">


            <table>
                <tr style>
                    <th>Title</th>
                    
                    <th>Price</th>
                    <th> Category</th>
                    <th>Quantity</th>
                    <th>Description</th>

                    <th>version</th>
                    <th>size</th>  

                    <th>Delivery</th>
                  
                    <th>delivery per meter</th>

                    <th>year</th>
                    <th>image</th>
                    <th>gallery 1</th>
                    <th>gallery 2</th>
                    <th>gallery 3</th>
                    <th>gallery 4</th>
                    <th>gallery 5</th>
                    <th>gallery 6</th>
                    <th>gallery 7</th>
                    <th>gallery 8</th>
    
                

                    <th>Edit</th>
                    <th>Delete</th>                  
                </tr>
                @foreach ($product  as $products)    
                <tr>
                    <td>{{$products->title}}</td> 
                    <td>{{$products->price}}</td>                                      
                    <td>{{$products->category}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->version}}</td>
                    <td>{{$products->size}}</td>
                    <td>{{$products->delivery}}</td>
                    <td>{{$products->delivery_m}}</td>
                    <td>{{$products->year}}</td>
                    

                    
                    <td>
                        <img height="120px" src="Products/{{$products->image}}" alt="no image, please do upload one">
                    </td>
                    <td>
                      <img height="120px" src="Products/{{$products->gallery_1}}" alt="no image, please do upload one">
                  </td>
                  <td>
                    <img height="120px" src="Products/{{$products->gallery_2}}" alt="no image, please do upload one">
                </td>
                <td>
                  <img height="120px" src="Products/{{$products->gallery_3}}" alt="no image, please do upload one">
              </td>
              <td>
                <img height="120px" src="Products/{{$products->gallery_4}}" alt="no image, please do upload one">
            </td>
            <td>
              <img height="120px" src="Products/{{$products->gallery_5}}" alt="no image, please do upload one">
          </td>
          <td>
            <img height="120px" src="Products/{{$products->gallery_6}}" alt="no image, please do upload one">
        </td>
        <td>
          <img height="120px" src="Products/{{$products->gallery_7}}" alt="no image, please do upload one">
      </td>
      <td>
        <img height="120px" src="Products/{{$products->gallery_8}}" alt="no image, please do upload one">
    </td>

                    <td>
                        <a class="btn btn-success" href="{{url('edit_product',$products->id)}}">Edit</a>
                      </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                      </td>

                </tr>

                @endforeach  
            </table>
            <br><br><br>

            </div>
            {{$product->links()}};
          </div>
        </div>
      </div>



      

    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation(ev){
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
  
          swal({
            title: "Are you sure you want to delete this ",
            text: "The delete is permanent",
            icon:"warning",
            buttons: true,
            dangerMode: true
          })
          .then((willCancel)=>{
            if(willCancel)
          {
            window.location.href=urlToRedirect;
          }
          });
  
        }
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

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