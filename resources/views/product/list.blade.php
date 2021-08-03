<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Style/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }
        th {
            background-color:orangered;
            color: white;
            height: 100px;
        }
        .buy{
            color: orangered;
        }
        .buy:hover{
            transition: 0.5s;
            transform: scale(3);
        }
        tr:hover{
            background-color: #eaac94;
        }
        i{
            width:50px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    @if(\Illuminate\Support\Facades\Session::has('success-msg'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                  class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Action Success!</h3>
            <p>{{\Illuminate\Support\Facades\Session::get('success-msg')}}</p>
        </div>
    @endif
        @if(\Illuminate\Support\Facades\Session::has('error-msg'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                  class="w3-button w3-large w3-display-topright">&times;</span>
                <h3>Action Fails!</h3>
            <p>{{\Illuminate\Support\Facades\Session::get('error-msg')}}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price(VND)</th>
            <th>Origin</th>
            <th>Buy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $product)
            <tr>
                <td width="100px">{{$product->id}}</td>
                <td width="500px">{{$product->name}}</td>
                <td class="text-lg-center"><img src="{{$product->images}}" width="100px" alt=""></td>
                <td>{{$product->price}}</td>
                <td>{{$product->origin}}</td>
                <td>
                    <a href="/cart/add?productId={{$product->id}}&&productQuantity=1"><i class="fas fa-shopping-cart buy "></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="Script/bootstrap.min.js"></script>
<script src="Script/jquery.min.js"></script>
</body>
</html>
