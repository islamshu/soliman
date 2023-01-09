<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
class PayPalPaymentController extends Controller
{

    public function handlePayment()
    {
        $carts = session()->get('cart');
      
        $total = 0;
        foreach ($carts as $item) {
            $price = $item['price'] * $item['quantity'];
            $total += $price;
        }
       
      
        $product = [];
        $i=0;
        foreach($carts as $key=>$cart){
            $p = Product::find($key);
            $product['items'][$key]['name']=$cart['title'];
            $product['items'][$key]['price']= $cart['price'];
            $product['items'][$key]['desc']= $cart['title'];
            $product['items'][$key]['qty']= $cart['quantity'];
            $i++;
        }
        $product['invoice_id'] = date('Ymd-His').rand(10,99);
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $total;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
       
    

        return redirect($res['paypal_link']);
    }



    public function paymentCancel()

    {

        return redirect()->route('home')->with('error_flash','Paymet Failed Or Canceled ');
    }



    public function paymentSuccess(Request $request)

    {

        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            
        $carts = session()->get('cart');
      
        $total = 0;
        foreach ($carts as $item) {
            $price = $item['price'] * $item['quantity'];
            $total += $price;
        }
       
        $order = new Order();
        if(!auth()->check()){
        $order->name = $request->user_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->user_type = 'guest';
        }else{
            $order->name = auth()->user()->name;
            $order->phone =auth()->user()->phone;
            $order->email =auth()->user()->email;
            $order->user_type = 'user';
            $order->user_id = auth()->id();
        }
        $order->price = $total;
        $order->status = 'paid';
        $order->payment_method = 'paypal';
        $order->more_date = json_encode($request->all());
        $order->code = date('Ymd-His').rand(10,99);
        $order->save();
        foreach(session('cart') as $id => $details){
            $orderDet = new OrderDetail();
            $orderDet->order_id = $order->id;
            $orderDet->product_id = $id;
            $orderDet->qty = $details['quantity'];
            $orderDet->price = get_cart_price($id);
            $orderDet->total  = $orderDet->price *  $orderDet->qty;
            $orderDet->save();
        }
        session()->forget('cart');
        return redirect()->route('get_order',$order->id)->with('success_flash', 'Order Succeeed');
        Session::flash('success', 'Payment successful!');
        }



       
    }
}
