<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;
class CartController extends Controller
{
    public function index(){
        // Session::forget('cart');

        $count =  count((array) session('cart'));
        if (!$count) {
            return back()->with('error_flash', 'Cart Is Empty');
        }
        else {
            $cart = session()->get('cart');

            $total = 0;
            foreach ($cart as $item) {
                $price = $item['price'] * $item['quantity'];
                $total += $price;
            }
            return view('front.cart')->with('carts',session('cart'))->with('total',$total);
        }
    }
    public function remove(Request $request)
    {
        
        if($request->id) {
            
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $cart = session()->get('cart');

            $total = 0;
            foreach ($cart as $item) {
                $price = $item['price'] * $item['quantity'];
                $total += $price;
            }
            return back()->with('success_flash', 'Deleted successfully');

        }
        return true;
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $total = 0;
            foreach ($cart as $item) {
                $price = $item['price'] * $item['quantity'];
                $total += $price;
            }
            // session()->flash('success_falsh', 'Cart updated successfully');
            $resoponse = array(
                'success'=>1,
                'total'=>$total,
                'price'=> $cart[$request->id]["price"] * $request->quantity,
                'message'=>'Cart updated successfully'
                );
                return $resoponse;


        }
    }
    public function addToCart(Request $request)
    {
        $id = $request->product_id;
        
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id'=>$id,
                "title" => $product->title,
                "quantity" => 1,
                "price" => get_cart_price($id),
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        $count =  count((array) session('cart'));

        $resoponse = array(
            'success'=>1,
            'count'=> $count ,
            'message'=>'Added to Cart'
            );
        return $resoponse;
        }
}
