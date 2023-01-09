@extends('layouts.frontend')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Microsoft Office 2021 Home</li>
        </ol>
    </nav>
   </div>
    <div class="product-item">
        <div class="container">

        <div class="product">
            
            <div class="row mb-4">
                <div class="col-lg-4">
                    <div class="img-box">
                        <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                        {{-- <span class="discound">-10%</span> --}}
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="product-info">
                        <h2>{{ $item->title }}</h2>


                       

                        <p>{!! $item->description !!}
                        </p>


                       {{ get_price($item->id) }}

                       <button type="button" class="btn btn-info" onclick="addToCart({{ $item->id }})">add to cart  <i class="fa-solid fa-cart-shopping"></i></button>



                     
                    </div>
                </div>
            </div>
        </div>

            <div class="row" style="margin-top:30px;">
                <div class="col-lg-8">
                    <div class="product-deatils">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Features</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">System Requirements</button>
                            </li>
            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                              @if($item->description != null)
                                {!! $item->description !!}
                              @else
                              <p>No description</p>
                              @endif
                            
            
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
            
                                @if($item->penefit != null)
                                {!! $item->penefit !!}
                              @else
                              <p>No Features</p>
                              @endif
                            
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                                tabindex="0">
                                @if($item->system_requirements != null)
                                @else
                              <p>No System Requirements</p>
                              @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="related-products">
                        <h4>realted products</h4>
                        @foreach ($related as $item)
                            
                        
                        <div class="related-products-item">
                            
                            <div class="img-box">
                                <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                            </div>
                           <div class="" >
                            <a href="{{ route('single_product',Crypt::encrypt($item->id)) }}"><h5>{{ $item->title }}</h5></a>
                            <span class="type">{{ @$item->category->title }}</span>
                            <h4>{{ get_cart_price($item->id) }}$</h4>
                           </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection