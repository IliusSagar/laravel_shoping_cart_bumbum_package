<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function AddCart($id){
        $product = DB::table('products')->where('id',$id)->first();
        $data = array();

        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image;
        Cart::add($data);

        return \Response::json(['success' => "Successfully Added on your Cart"]);
    }

    public function check(){
        $content = Cart::content();
        return response()->json($content);
    }

    public function AddPro(Request $request, $id){
        $product = DB::table('products')->where('id',$id)->first();
        $data = array();

        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image;
        Cart::add($data);

        return redirect()->back();
    }

    public function ShowCart(){
        $cart = Cart::content();
        // return response($cart);
        return view('cartpage',compact('cart'));
    }

    public function removeCart($rowId){
        Cart::remove($rowId);

        return Redirect()->back();
    }
}
