<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
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
            $cartItem->id = $product->id;
            $cartItem->name = $product->name;
            $cartItem->images = $product->images;
            $cartItem->origin = $product->origin;
            $cartItem->price = $product->price;
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
}
