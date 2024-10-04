<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)
    {
       $product=Product::find($id);
     
        $productId=$product->id;
        $productName=$product->productname;
        $price=$product->price;
        $image=$product->image;
        $quantity = $request->input('quantityproduct',1);
    
        $existingProduct = Cart::search(function ($cartItem, $rowId) use ($productId) {
            return $cartItem->id == $productId;
        });
                
        Cart::add([
            'id'=>$productId,
            'name'=>$productName,
            'price'=>$price,
            'qty'=>$quantity,
            'options' => ['image' => $image]
        ]);
       return redirect()->back();
       
    }

    public function removeProduct($rowId) {
        $item = Cart::get($rowId);  
        if ($item) {
            Cart::remove($rowId);         
        } else {         
            return redirect()->back();
        }  
        return redirect()->back();
    }
    public function removeAllProduct() {                       
       Cart::destroy();
        return redirect()->back();
    }
    public function updateQty($rowId, Request $request){
        $item = Cart::get($rowId);
        $qty = $request->input("quantity");  
    
        if ($item) {
            Cart::update($rowId, $qty);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    
} 
