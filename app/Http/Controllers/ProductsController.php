<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $list = Products::all();
      return view('product.list',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return view('product.show',['shoppingCart'=>Session::get('shoppingCart')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productId = $request->get('productId');
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
            unset($shoppingCart[$productId]);
            Session::put('shoppingCart',$shoppingCart);
            Session::flash('error-msg','Xóa sản phẩm khỏi giỏ hàng thành công!');
            return redirect('/cart/show');
        }
    }

    public function add(Request $request){
        $productId = $request->get('productId');
        $productQuantity = $request->get('productQuantity');
        $action = $request->get('action');
        $product = Products::find($productId);
        if ($product == null){
            return view('404_error');
        }
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');

        }else{
            $shoppingCart = [];
        }
        $cartItem = null;
        if (!array_key_exists($productId, $shoppingCart)){
            $cartItem = new stdClass();
            $cartItem->id = $productId;
            $cartItem->name = $product->name;
            $cartItem->images = $product->images;
            $cartItem->origin = $product->origin;
            $cartItem->unitprice = $product->price;
            $cartItem->quantity = $productQuantity;
        }else{
            $cartItem = $shoppingCart[$productId];
            if ($action != null && $action == 'update'){
                $cartItem->quantity = $productQuantity;
            }else{
                $cartItem->quantity += $productQuantity;
            }
        }
        $shoppingCart[$productId] = $cartItem;
        Session::put('shoppingCart',$shoppingCart);
        Session::flash('success-msg','Thêm sản phẩm vào giỏ hàng thành công');
        return redirect('/cart/show');

    }


    public function save(Request $request){
        if (!Session::has('shoppingCart') || count(Session::get('shoppingCart')) == 0){
            Session::flash('error-msg', 'Hiện tại không có sản phẩm nào trong giỏ hàng. Vui lòng chọn mua sản phẩm!');
            return redirect('products');
        }
        $shoppingCart = Session::get('shoppingCart');
        $order = new Order();
        $order->totalPrice = 0;
        $order->customerId = 1;
        $order->shipName = $request->get('fullName');
        $order->shipPhone = $request->get('phone');
        $order->shipAddress = $request->get('address');
        $order->note = $request->get('note');
        $order->ischeckout = false;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->status = 0;
        $orderDetails = [];
        $messageError = '';
        foreach ($shoppingCart as $cartItem){
            $product = Products::find($cartItem->id);
            if ($product == null){
                $messageError = 'Có lỗi xảy ra, sản phẩm với id' .$cartItem->id. 'Không tồn tại hoặc đã bị xóa!';
                break;
            }
            $orderDetail = new Order_detail();
            $orderDetail->productId = $product->id;
            $orderDetail->unitPrice = $product->price;
            $orderDetail->quantity = $cartItem->quantity;
            $order->totalPrice += $orderDetail->quantity * $orderDetail->unitPrice;
            array_push($orderDetails, $orderDetail);
        }
        if (count($orderDetails) == 0)  {
            Session::flash('error-msg',$messageError);
            return redirect('products');
        }
        try {
            DB::beginTransaction();
            $order->save();
            $orderDetailArray = [];
            foreach ($orderDetails as $orderDetail){
                $orderDetail->orderId = $order->id;
                array_push($orderDetailArray, $orderDetail->toArray());
            }
            Order_detail::insert($orderDetailArray);
            DB::commit();
            Session::forget('shoppingCart');
            Session::flash('success-msg', 'Lưu đơn hàng thành công!');
        }catch (\Exception $e){
            DB::rollBack();
            Session::flash('error-msg', 'Lưu đơn hàng thất bại. Vui lòng điền đầy đủ thông tin!');
        }
        return redirect('/products');
    }
}
