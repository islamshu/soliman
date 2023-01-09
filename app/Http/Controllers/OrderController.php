<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get_order($id){
        return view('front.order')->with('order',Order::find($id));
    }
}
