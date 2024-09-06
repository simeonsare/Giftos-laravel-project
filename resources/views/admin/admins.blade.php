<!DOCTYPE html>
<html>
  <head>
    
    @include('admin.css')
    <style>
        tr{
            border: solid;
        }
        th{
            border: solid;
        }
        td{
            border: solid;
            
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
            <h1>Admins </h1>
  
            <div>
              <table style="border: solid">
                <tr style="border: solid" >
                  <th style="font-weight: bold"> Name</th>
                  <th style="font-weight: bold"> Email</th>
                  <th style="font-weight: bold"> Phone</th>
                  <th>Action  </th>
                  <th>Delete  </th>
                </tr>
                @foreach ($data as $data)
                    
                
                <tr style="border: 2px solid rgb(48, 71, 71);">

                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone}}</td>
                  <td style="padding: 5px"> 
                    <a class="btn btn-success" style="margin: 5px" href="{{url('demote',$data->id)}}">Demote</a>
                  </td>
                  <td>
                    <a class="btn btn-danger" style="margin: 5px" onclick="confirmation(event)" href="{{url('delete_user',$data->id)}}">Delete</a>
                  </td>
                </tr>
                 @endforeach
              </table>
            </div>
    
          



    </div>



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
    <!-- JavaScript files-->
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