@extends('layouts.frontend')
@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
            <div class="card-body p-5">
  
              <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Detiles </p>
  
              <div class="row">
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Date</p>
                  <p>{{ $order->created_at->diffForHumans() }}</p>
                </div>
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Order No.</p>
                  <p>#{{ $order->code }}</p>
                </div>
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Payment method.</p>
                  <p>{{ $order->payment_method }}</p>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-3 mb-3">
                  <p class="small text-muted mb-1">Name</p>
                  <p>{{ $order->name}}</p>
                </div>
                <div class="col-md-5 mb-3">
                    <p class="small text-muted mb-1">Email</p>
                    <p>{{ $order->email }}</p>
                  </div>
                  <div class="col-md-4 mb-3">
                    <p class="small text-muted mb-1">Phone</p>
                    <p>{{ $order->phone }}</p>
                  </div>
              </div>
  
  
              <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                <div class="row">
                  <div class="col-md-2 col-lg-3">
                    <p>Product Image</p>
                  </div>
                  <div class="col-md-2 col-lg-3">
                    <p>Product Name</p>
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <p>QTY</p>
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <p>Unit Price</p>
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <p> Total</p>
                  </div>
                </div>
                @foreach ($order->orderDetiles as $item)
                @php
                    $product = App\Models\Product::find($item->product_id);
                @endphp
                    
                <div class="row">
                    <div class="col-md-2 col-lg-3">
                      <p><img src="{{ asset('uploads/'.$product->image) }}" width="70" height="50" alt=""></p>
                    </div>
                    <div class="col-md-2 col-lg-3">
                      <p>{{ $product->title }}</p>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <p>{{ $item->qty }}</p>
                      </div>
                    <div class="col-md-2 col-lg-2">
                      <p>{{ $item->price }}$</p>
                    </div>
                    
                    <div class="col-md-2 col-lg-2">
                      <p> {{ $item->total }}$</p>
                    </div>
                  </div>
                @endforeach

              </div>
  
              <div class="row my-4">
                <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                  <p class="lead fw-bold mb-0" style="color: #f37a27;"> Total : ${{ $order->orderDetiles->sum('total') }} </p>
                </div>
              </div>
  
  
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection