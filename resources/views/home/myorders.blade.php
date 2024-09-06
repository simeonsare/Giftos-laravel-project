<!DOCTYPE html>
<html>

<head>

 @include('home.css')
 <style>
        .container-fluid {
            display: flex;
            align-items: center;
   
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
            height: 100px;
            width: 100px;
        }

        .filter-btns {
            margin-bottom: 20px;
        }

        .filter-btns form {
            display: inline-block;
            margin-right: 10px;
        }

        .status {
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .status-in-progress {
            background-color: red;
        }

        .status-confirmed {
            background-color: blue;
        }

        .status-delivered {
            background-color: green;
        }

 </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->

  </div>
  <!-- end hero area -->
<br><br><br>
  <!-- order section -->
  <div class="container-fluid">
    <table>
        <thead>
            <tr>
          
                <th>Product Name</th>
                <th>Order ID</th>
                <th>Quantity</th>
                     <th>Total</th>
                <th>Image</th> 
           
                <th>Status</th>
 
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $order)
            <tr>
     
                <td>{{$order->product->title}}</td>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total }}</td>
                <td><img src="/Products/{{ $order->product->image }}" alt=""></td>
              
                <td>
                    <span class="status {{ 
                        $order->status == 'in_progress' ? 'status-in-progress' : 
                        ($order->status == 'confirmed' ? 'status-confirmed' : 'status-delivered') 
                    }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br>




  <!-- end order section -->


   

  <!-- info section -->
@include('home.footer')

</body>

</html>