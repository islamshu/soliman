@extends('layouts.frontend')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>



            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-products">

                    <table class="table">

                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            {{-- {{ dd($carts) }} --}}
                            @foreach ($carts as $id=>$item)
                            <tr data-id="{{ $id }}">
                                <th><a href=""><img src="{{ asset('uploads/'.$item['image']) }}" alt=""></a></th>
                                <th><p class="product-des">{{ $item['title'] }}</p></th>
                                <th><span class="price">${{ $item['price'] }}</span></th>
                                <th><input class="form-control num update-cart quantity" id="quantity_{{ $item['id'] }}" min="1" onchange="updatecart({{ $item['id'] }})" value="{{ $item['quantity'] }}" type="number"></th>
                                <th><span class="total-price price_product"  id="price_{{ $item['id'] }}">${{ $item['price'] * $item['quantity'] }}</span></th>
                                <th> <a style="margin-top: 25%" class="btn btn-danger" onclick="reomverfromcart({{ $id }})">Delete</a></th>
                            </tr>
                            @endforeach

    
                         
                        </tbody>
    
                    </table>
                </div>

                </div>

                <div class="col-lg-3">
                    <div class="checkOut">
                        <h5>CART TOTALS</h5>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span>Total</span>
                            <span id="total_checkout">{{ $total }}$</span>
                        </div>
                        <a href="{{ route('stripe') }}" class="btn btn-danger m-auto w-100">	Proceed to checkout</a>
                    </div>
                </div>
            </div>


</div>
@endsection