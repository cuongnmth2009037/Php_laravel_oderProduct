<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{url('Style/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color:orangered;
            color: white;
            height: 100px;
            text-align: center;
        }
        h2{
            color:orangered ;
            text-align: center;
        }
        tr:hover{
            background-color:#eaac94;
        }
        .update{
            background-color: #437dee;
        }
        .update:hover{
            transition: 0.5s;
            transform: scale(1.5);
            cursor: pointer;
        }
        .delete{
            background-color: red;
        }
        .delete:hover{
            transition: 0.5s;
            transform: scale(1.5);
            cursor: pointer;
        }
    </style>
</head>
<body>
@if(isset($shoppingCart))
   <div class="container-fluid">
       <h2>Cart Information</h2>
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
       <a href="/products">Back to product list</a>
       <table class="table table-bordered ">
           <thead>
           <tr>
               <th>Name</th>
               <th>Image</th>
               <th>Origin</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Total price</th>
               <th>Operation</th>
           </tr>
           </thead>
           <tbody>
           @foreach($shoppingCart as $cartItem)
               <form action="/cart/add" method="get">
                   @csrf
                   <input type="hidden" name="action" value="update">
                   <input type="hidden" name="productId" value="{{$cartItem->id}}">
                   <tr>
                       <td><img src="{{$cartItem->images}}" width="100px" alt=""></td>
                       <td width="500px">{{$cartItem->name}}</td>
                       <td>{{$cartItem->origin}}</td>
                       <td>{{$cartItem->unitprice}}</td>
                       <td><input type="number" min="1" name="productQuantity" value="{{$cartItem->quantity}}"></td>
                       <td>{{$cartItem->quantity * $cartItem->unitprice}}</td>
                       <td>
                           <button class="update"><i class="fas fa-edit"></i>Update</button>
                           <button class="delete"><a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" href="/cart/delete?productId={{$cartItem->id}}"><i class="fas fa-trash"></i>Delete</a></button>
                       </td>
                   </tr>
               </form>
           @endforeach
           </tbody>
       </table>
       <div class="w3-row" >
           <div class="container">
               <form class="container" action="/cart/save" method="post">
                   @csrf
                   <div class="form-group">
                       <label>Fullname</label>
                       <input class="form-control" type="text" name="fullName">
                   </div>
                  <div class="form-group">
                      <label>Phone number</label>
                      <input class="form-control" type="text" name="phone">
                  </div>
                 <div class="form-group">
                     <label>Address</label>
                     <textarea class="form-control" name="address"></textarea>
                 </div>
                   <div class="form-group">
                       <label>Note</label>
                       <textarea class="form-control" name="note"></textarea>
                   </div>
                   <div class="form-group">
                       <button class="btn btn-primary">Submit order</button>
                   </div>
               </form>
           </div>
       </div>
       @else
           Bạn Chưa có sản phẩm nào trong giỏ hàng, <a href="/products"><u>click vào đây</u></a> để tiếp tục mua sắm
   </div>
@endif
<script src="Script/bootstrap.min.js"></script>
<script src="Script/jquery.min.js"></script>
</body>
</html>
