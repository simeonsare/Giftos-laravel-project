<!DOCTYPE html>
<html>
  <head>
    
    @include('admin.css')
    <style>
              td {
                padding: 10px;
            border: solid rgb(100, 100, 100);
            text-align: center;
        }
        th {
            padding: 10px;
            border: solid rgb(100, 100, 100);
            text-align: center;
        }
        tr {
            border-bottom: solid rgb(100, 100, 100);
            border-right: solid rgb(100, 100, 100);
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

        <h2 class="h5 no-margin-bottom">Dashboard</h2>
      </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="stats-2-block block d-flex">
            <div class="stats-2 d-flex">

              <div class="stats-2-content">
                <strong class="d-block">{{$users}} </strong>
                <span class="d-block">clients</span>
                <a href="{{url('/user_admin')}}">
                        <span class="d-block">Make Admin</span>
                </a>

        
                <div class="progress progress-template progress-small">
                  <div role="progressbar" style="width: 60%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-2"></div>
                </div>
              </div>
            </div>
            <div class="stats-2 d-flex">
   
              <div class="stats-2-content">
                <strong class="d-block">{{$admins}} </strong>
                <span class="d-block">ADMINS</span>
                <a href="{{url('/admin_user')}}">
                                <span class="d-block">Demote Admin</span>

                </a>

                <div class="progress progress-template progress-small">
                  <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-3"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><i class="icon-contract"></i></div><strong>All orders</strong>
                </div>
                <div class="number dashtext-2">{{$orders}}</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>All Products</strong>
                </div>
                <div class="number dashtext-3">{{$products}}</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Categories</strong>
                </div>
                <div class="number dashtext-4">{{$categories}}</div>
              </div>
              
    </section>
  

      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
     
              <div class="stats-3-block block d-flex">
                <div class="stats-3"><strong class="d-block">{{$incomplete}}</strong><span class="d-block">Incomplete Orders</span>
                  <div class="progress progress-template progress-small">
                    <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-1"></div>
                  </div>
                </div>
                <a href="{{ url('filter_orders/new') }}" >    
                  <div class="stats-3 d-flex justify-content-between text-center">
                  <div class="item"><strong class="d-block strong-sm">{{$new}}</strong><span class="d-block span-sm">New Orders</span>
                  {{--   <div class="line"></div><small>{{}}</small> --}}
                  </div>
                </a>


                <a href="{{ url('filter_orders/confirmed') }}">
                <div class="item"><strong class="d-block strong-sm">{{$confirmed}}</strong><span class="d-block span-sm">Confirmed</span>
                    <div class="line"></div><small></small>
                  </div>
                </a>
                <a href="{{ url('filter_orders/delivered') }}">
                  <div class="item" style="color: green"><strong class="d-block strong-sm" >{{$delivered}}</strong><span class="d-block span-sm" style="color: green">Delivered</span>
                    <div class="line"></div><small></small>
                  </div>
                </div>
              </a>

              </div>
            </div>
    </section>
  
 <br>

    <section class="no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="stats-3-block block">
            <h1>   Inventory Check </h1>
            <table >
              <th>Product name </th>
              <th>Quantity</th>
              <th>Update amount</th>

              @foreach ($inventory as $item)
              <tr>
              <td>{{$item->title}} </td>
              <td>{{$item->quantity}} </td>
              <td>
                <a class="btn btn-success" href="{{url('edit_product',$item->id)}}">Update</a>
              </td>
            <td>
              </tr>
   
                  
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </section>

    
 
       
    <footer class="footer">
      <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
          <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
           <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
        </div>
      </div>
    </footer>
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