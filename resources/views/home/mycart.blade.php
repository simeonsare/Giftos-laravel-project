<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
@include('home.css')
    <style>
        /* Add the CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        label{
            width: 100px
        }

        .cart-container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #030303;
            color: white;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #266575;
            color: white;
            border: none;
            cursor: pointer;
        }

        .quantity-control input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 5px;
        }


    </style>
</head>
<body> 
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
    
        <!-- end header section -->
        <!-- slider section -->

    <section style="align-items: center" class="slider_section">
    <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box"> 
                    <h1>My Cart</h1>
                    <div >
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>image</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td class="price">${{ $item->product->price }}</td>
                                    <td>
                                        <div class="quantity-control">
                                            <button onclick="location.href='{{ url('/update-quantity/' . $item->id . '/-1') }}'">-</button>
                                            <input type="text" value="{{ $item->quantity }}" readonly>
                                            <button onclick="location.href='{{ url('/update-quantity/' . $item->id . '/1') }}'">+</button>
                                        </div>
                                    </td>
                                    <td class="item-total">ksh{{ $item->total }}</td>
                                    <td>
                                        <img style="width:110px" src="Products/{{$item->product->image}}" alt="">
                                    </td>
                                    <td><button class="btn btn-danger" onclick="location.href='{{ url('/delete-item/' . $item->id) }}'">Remove Item</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>

       
         
              
                   
          


              </div>
            </div>
          </div>
          
        </div>
        
      </div>
      <div class="col-md-5 ">
        <div class="detail-box"> 
        <table>
            <tr>             <th>Grand Total</th> 
            <th><p style="color: #fff">{{$grandTotal}}</p></th>
            </tr>
   
        </table>
    </div>
    </div>
    <div class="col-md-7 ">
        <div class="detail-box"> 
            <form action="{{url('confirm_order')}}" method="post">
            @csrf
            <div>
                <label for="">Name</label>
                <input type="text" name="name" value="{{Auth::User()->name}}">

            </div>
            <div>
                <label for="">Phone</label>
                <input type="text" name="phone" value="{{Auth::User()->phone}}">

            </div>
            <div>
                <label for="">Address</label>
                <input type="text" name="rec_address" value="{{Auth::User()->address}}">

            </div>
            <div>

                <input style="margin-left: 50px; margin-top:10px" type="submit" class="btn btn-danger" value="Confirm Order">

            </div>
        </form>
        </div>


            
    </div>
    </div>

    
  </section>

    </div>
</body>

</html>
