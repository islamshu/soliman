@extends('layouts.frontend')
@section('content')
    
<div class="container">
    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
        </ol>
    </nav>
   </div>
<div class="products">
    <div class="container">
        <div class="row">
            @foreach ($products as $item)
                
            <div class="col-lg-4">
                <div class="item">
                    <a href="">

                        <div class="item-img">
                            <img src="{{asset('uploads/'.$item->image)  }}" width="400" height="200"  alt="{{ $item->title }}">
                        </div>

                    

                        <h2>{{ $item->title }}</h2>
                        {{ get_price($item->id) }}
                      

                        <a class="btn addToCart" onclick="addToCart({{ $item->id }})"> add to cart <i class="fa-solid fa-cart-shopping"></i></a>
                        <a onclick="addToCartAndBuy({{ $item->id }})"class="btn buy-now">buy now</a>
                    </a>
                </div>
            </div>
            @endforeach
            {{ $products->links() }}



        </div>
    </div>
</div>
@endsection