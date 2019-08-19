<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product = Product::find($request->id);

      //  return $request->all();
              Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->quantity,
            'weight' => $request->quantity,
            'tax' => 0,
            'options' => [
                'image' => $product->product_image                
                ]

        ]);

        return redirect('cart/show');

    }
    public function showCart(){
       $cartProducts= Cart::content();
      // return $cartProducts;

        return view( 'front-end.cart.show-cart',['cartProducts'=>$cartProducts] );
    }
    public function deleteCart($id){
        Cart::remove($id);
        return redirect('cart/show')->with('message','Cart Item Removed');

    }
    public function updateCart(Request $request){
        //return $request->all();
        Cart::update(
            $request->rowId,
            $request->qty
            
        );
        return redirect('cart/show')->with('message', 'Item Quantity Updated');
    }
   
}
