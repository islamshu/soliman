<?php

use App\Models\General;
use App\Models\Product;

function get_general_value($key)
{
   $general = General::where('key', $key)->first();
   if($general){
       return $general->value;
   }
   return '';
}
function get_price($item){
    $product = Product::find($item);
    if($product->price_after_discount != null &&  $product->price_after_discount < $product->price ){
        echo 
        '<div class="price">
        <span>'.$product->price_after_discount .' dollar</span>
        <del>'.$product->price .' dollar</del>
    </div>';
    }else{
        echo 
        '<div class="price">
        <span>'.$product->price .' dollar</span>
    </div>';
    }
}
 function get_cart_price($item){
    $product = Product::find($item);
    if($product->price_after_discount != null &&  $product->price_after_discount < $product->price ){
        return $product->price_after_discount;
    }else{
        return $product->price;
    }
 }
