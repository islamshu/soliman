<?php
    
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use Stripe;
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $price = $item['price'] * $item['quantity'];
            $total += $price;
        }
        if($total == 0){
            return redirect('/')->with('error_flash','error');
        }
        return view('stripe')->with('total',$total);
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $price = $item['price'] * $item['quantity'];
            $total += $price;
        }
        Stripe\Stripe::setApiKey(get_general_value('STRIPE_SECRET'));
        if(!auth()->check()){
            $customer = Stripe\Customer::create(array(
                "email" => $request->email,
                "name" => $request->user_name,
                "source" => $request->stripeToken
            ));
        }else{
            $customer = Stripe\Customer::create(array(
                "email" =>auth()->user()->email,
                "name" => auth()->user()->name,
                "source" => $request->stripeToken
            )); 
        }
       
        Stripe\Charge::create ([
                "amount" => 100 * $total,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Paying product",
 
        ]); 
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
        $order->payment_method = 'stripe';
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
        return back();
    }
}