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
            border-left: 2px solid #ccc;
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

        .btn-action {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-confirm {
            background-color: red;
        }

        .btn-delivered {
            background-color: blue;
        }
    </style>
</head>
<body>
    <header class="header"> 
        @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="page-header">
                <h1>View Orders</h1>
                
                <!-- Filter Buttons -->
                <div class="filter-btns">
                    <form action="{{ url('filter_orders') }}" method="GET">
                        <input type="hidden" name="status" value="in_progress">
                        <input class="btn btn-secondary" type="submit" value="In Progress">
                    </form>
                    <form action="{{ url('filter_orders') }}" method="GET">
                        <input type="hidden" name="status" value="confirmed">
                        <input class="btn btn-secondary" type="submit" value="Confirmed">
                    </form>
                    <form action="{{ url('filter_orders') }}" method="GET">
                        <input type="hidden" name="status" value="delivered">
                        <input class="btn btn-secondary" type="submit" value="Delivered">
                    </form>
                    <form action="{{ url('view_orders') }}" method="GET">
                        <input class="btn btn-secondary" type="submit" value="Show All">
                    </form>
                </div>

                <div class="container-fluid">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Order ID</th>
                                <th>Quantity</th>
                                <th>Image</th> 
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{$order->product->title}}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td><img src="/Products/{{ $order->product->image }}" alt=""></td>
                                <td>{{ $order->rec_address }}</td>
                                <td>
                                    <span class="status {{ 
                                        $order->status == 'in_progress' ? 'status-in-progress' : 
                                        ($order->status == 'confirmed' ? 'status-confirmed' : 'status-delivered') 
                                    }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($order->status == 'in_progress')
                                        <form action="{{ url('update_order_status/' . $order->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="btn-action btn-confirm">Confirm</button>
                                        </form>
                                    @elseif($order->status == 'confirmed')
                                        <form action="{{ url('update_order_status/' . $order->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="delivered">
                                            <button type="submit" class="btn-action btn-delivered">Delivered</button>
                                        </form>
                                    @else
                                        Delivered
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{ asset('admincss/js/front.js')}}"></script>
</body>
</html>
