@extends('layouts.frontend')
@section('content')
    <header>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach (App\Models\Slider::where('status', 1)->get() as $key => $item)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        @if ($key == 0) class="active" @endif aria-current="true"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach

            </div>
            <div class="carousel-inner">
                @foreach (App\Models\Slider::where('status', 1)->get() as $key => $item)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <a href="{{ $item->url }}"><img src="{{ asset('uploads/' . $item->image) }}" class="d-block w-100"
                                alt="..."></a>

                    </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </header>


    <div class="container">
        <div class="category">
            <h2><span>category</span></h2>

            <div class="row">
                @foreach (App\Models\Category::where('is_feture', 1)->take(4)->get() as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="category-item ">
                        <a href="{{ route('category',$item->id) }}" class="c-link">

                            <div class="img-box">
                                <img src="{{ asset('uploads/' . $item->image) }}" alt="">
                            </div>
                            <div class="">
                                <h3>{{ $item->title }}</h3>
                                <a href="{{ route('category',$item->id) }}">
                                    <p>shop now <span><i class="fa-solid fa-arrow-right"></i></span></p>
                                </a>
                            </div>

                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>

    @if(get_general_value('is_feture') == 1)
    <div class="container">
        <div class="features">
            <h2>Our Features</h2>
            <div class="row">
                @foreach (App\Models\Fteure::get() as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="item">
                            <div class="img-item">
                                <img src="{{ asset('uploads/' . $item->image) }}" alt="">
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p>{!! $item->body !!}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif



    <div class="container">
        <div class="products">
            <h2><span>Our Products</span></h2>

            <!-- <h2 class="m-auto text-center mb-4"> Our Products</h2> -->
            <div class="owl-carousel owl-one owl-theme">
                @foreach (App\Models\Product::where('status',1)->inRandomOrder()->limit(5)->get() as $item)

                <div class="item">
                    <a href="">

                        <div class="item-img">
                            <img src="{{asset('uploads/'.$item->image)  }}" alt="">
                        </div>



                        <h2>{{ $item->title }}</h2>
                        {{ get_price($item->id) }}


                        <a class="btn addToCart" onclick="addToCart({{ $item->id }})"> add to cart <i class="fa-solid fa-cart-shopping"></i></a>
                        <a onclick="addToCartAndBuy({{ $item->id }})"class="btn buy-now">buy now</a>
                    </a>
                </div>
                @endforeach









            </div>
        </div>
    </div>

    <div class="container">
        <div class="RecentlyAdded">
            <h1><span>newly added</span></h1>
            <div class="owl-carousel owl-two owl-theme two mt-3">
                @foreach (App\Models\Product::where('status',1)->orderby('id','desc')->limit(8)->get() as $item)

                <div class="RecentlyAddedItem">
                <a href="{{ route('single_product',Crypt::encrypt($item->id)) }}">
                    <span class="type">{{ $item->category->title }}</span>
                    <h2>{{ $item->title }}</h2>
                    <div class="img-box">
                        <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                    </div>

                    <div class="d-flex justify-content-between">
                        <h5>{{ $item->price_after_discount }} $</h5>
                        <a href="{{ route('single_product',Crypt::encrypt($item->id)) }}"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    </a>
                </div>
                @endforeach


            </div>
        </div>
    </div>

    <div class="container">

        <div class="bestSeller RecentlyAdded">
            <h1><span>best seller</span></h1>
            <div class="owl-carousel owl-two owl-theme two mt-3">

                @foreach (App\Models\Product::where('status',1)->where('is_best',1)->orderby('id','desc')->limit(8)->get() as $item)

                <div class="RecentlyAddedItem">
                    <a href="{{ route('single_product',Crypt::encrypt($item->id)) }}">
                    <span class="type">{{ $item->category->title }}</span>
                    <h2>{{ $item->title }}</h2>
                    <div class="img-box">
                        <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                    </div>

                    <div class="d-flex justify-content-between">
                        <h5>{{ $item->price_after_discount }} $</h5>
                        <a href="{{ route('single_product',Crypt::encrypt($item->id)) }}"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @if(get_general_value('how_work') == 1)

    <div class="container">

        <div class="howItWorks">
            <h2>How It Works</h2>
            <div class="row">
                @foreach (App\Models\HowItWork::orderby('order')->get() as $key=>$item)

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="item">
                        <div class="img-item">
                            <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                        </div>
                        <h2>{{ $item->title }}</h2>
                        <p>{!! $item->body!!}</p>
                        <span>{{ $key +1 }}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    @endif



    <div class="joinUs d-flex">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-12 mb-sm-2  d-flex">
                    <i class="fa-solid fa-paper-plane me-2"></i>
                    <h4>Subscribe to the daily mail service.</h4>
                </div>
                <div class="col-lg-8 col-12">
                    <form >
                        <input class="form-control " type="email" placeholder="Enter Email" name=""
                            id="mail_sender">
                        <button type="button" class="btn btn-info send_mail">send</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
