<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="{{ asset('uploads/'.get_general_value('icon')) }}">


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <style>
        :root{
            --notMainColor :{{ get_general_value('not_main_color') }};
            --mainColor:{{ get_general_value('main_color') }};

        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    @yield('css')

    <title>{{ get_general_value('title') }}</title>
</head>

<body>

    <!-- <div class="upper-bar">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-3">
                    <p>Welcome to {{ get_general_value('title') }}</p>
                </div>

                <div class="col-lg-6 d-flex align-items-center justify-content-end">


                    @auth


                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p><a href="{{ route('account') }}">My account</a></p>
                    </div>
                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p><a href="{{ route('logout') }}">Logout</a></p>
                    </div>
                    @else
                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p><a href="{{ route('register') }}">Register</a> | <a href="{{ route('login') }}">Login</a></p>
                    </div>
                    @endauth
                </div>

            </div>
        </div>
    </div> -->
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('uploads/' . get_general_value('image')) }}"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach (App\Models\Menu::where('menu_id',null)->where('status',1)->orderby('sort')->get() as $item)
                        <li class="nav-item dropdown">
                            <a class="nav-link "  role="button" @if($item->menus != '[]') href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" @else href="{{$item->url}}"@endif >
                                {{ $item->title }}
                            </a>
                            @if($item->menus != '[]')
                            {{-- {{ dd($item->menus) }} --}}

                            <ul class="dropdown-menu">
                                @foreach ($item->menus as $item)

                                <li><a class="dropdown-item" href="{{ $item->url }}">{{ $item->title }}</a></li>
                                @endforeach

                            </ul>

                            @endif

                        </li>
                    @endforeach




                </ul>

                <!-- <a href="" class="btn btn-info m-1 signIn">sign in</a>
                <a href="" class="btn btn-primary m-1 register">register</a> -->

                <div class="user-action">
                    {{-- <a href=""><i class="fa-solid fa-user"></i></a>
                    <a href=""><i class="fa-solid fa-heart"></i></a> --}}
                    <a href="{{ route('get_cart') }}"><i class="fa-solid fa-cart-shopping"></i><span class="ms-1"></span></a>

                </div>

                    @auth


                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p style="margin: 10px"><a href="{{ route('account') }}" style="text-decoration: none" >My account</a></p>
                    </div>
                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p style="margin: 10px"><a href="{{ route('logout') }}" style="text-decoration: none">Logout</a></p>
                    </div>
                    @else
                    <div class="upper-bar-item d-flex align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p style="margin: 10px"><a href="{{ route('register') }}" style="text-decoration: none">Register</a> | <a href="{{ route('login') }}">Login</a></p>
                    </div>
                    @endauth



            </div>
        </div>
    </nav>

    @yield('content')

    <footer>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-item">
                        <div class="img-box">
                            <img src="images/logo (2).png" alt="">
                        </div>
                        <div class="contact d-flex">
                            <i class="fa-solid fa-headphones"></i>
                            <div class="callus">
                                <span class="d-block">Got Questions ? Call us 24/7!</span>
                                <span class="d-block number">{{ get_general_value('phone_number') }}</span>
                            </div>
                        </div>

                        <div class="position">
                            <h4>contact info</h4>
                            <p> {!!  strip_tags(get_general_value('description')) !!}</p>

                        </div>
                        <ul class="d-flex">
                            @if(get_general_value('faceook') != null)
                            <li><a href="{{ get_general_value('faceook') }}"><i class="fa-brands fa-facebook"></i></a></li>
                            @endif
                            @if(get_general_value('whatsapp') != null)
                            <li><a href="{{ get_general_value('whatsapp') }}"><i class="fa-brands fa-whatsapp"></i></a></li>
                            @endif
                            @if(get_general_value('instagram') != null)
                            <li><a href="{{ get_general_value('instagram') }}"><i class="fa-brands fa-instagram"></i></a></li>
                            @endif
                            @if(get_general_value('email') != null)
                            <li><a href="mailto:{{ get_general_value('email') }}"><i class="fa-solid fa-envelope"></i></a></li>
                            @endif
                            @if(get_general_value('telegram') != null)
                            <li><a href="{{ get_general_value('telegram') }}"><i style="width: 100%;margin-right: 10px;height: 24px;" class="fa-brands fa-telegram"></i></a></li>
                            @endif
                            @if(get_general_value('snapchat') != null)
                            <li><a href="{{ get_general_value('snapchat') }}"><i style="width: 100%;margin-right: 10px;height: 24px;" class="fa-brands fa-snapchat"></i></a></li>
                            @endif



                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-item">
                        <ul>
                            @guest
                            <li><a href="{{ route('register') }}">Register</a> | <a href="{{ route('login') }}">Login</a></li>
                            @else
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            @endguest
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('usage_policy') }}">usage Policy</a></li>
                            <li><a href="{{ route('track_order') }}">Track Your Order</a></li>


                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-item">
                        <ul>
                            @auth
                            <li><a href="{{ route('account') }}">My Account</a></li>

                            @endauth
                            <li><a href="{{ route('get_cart') }}">My Cart</a></li>
                            <li><a href="{{ route('returns_exchange') }}">Returns/Exchange</a></li>
                        </ul>
                    </div>
                </div>



            </div>


    </footer>


    <div class="copyRights text-center">
        <div class="container">
            <p class="mb-0 p-2"> {{ get_general_value('title') }} 2023 &copy; all rights reseved</p>
        </div>
    </div>
    @include('front.flash_meesage')




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"
        integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    @yield('script')



    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error_flash'))
                toastr.error('{{ Session::get('error_flash') }}');
            @elseif (Session::has('success_flash'))
                toastr.success('{{ Session::get('success_flash') }}');
            @endif
        });

        function reomverfromcart(id) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        function addToCart(id) {
            $.ajax({
                type: "post",
                dataType: "json",
                url: '{{ route('add.to.cart') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'product_id': id
                },
                success: function(data) {
                    if (data.success != 1) {
                        toastr.error(data.message);
                    } else {
                        toastr.success(data.message);
                    }


                }

            });
        }

        function addToCartAndBuy(id) {
            $.ajax({
                type: "post",
                dataType: "json",
                url: '{{ route('add.to.cart') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'product_id': id
                },
                success: function(data) {
                    if (data.success != 1) {
                        toastr.error(data.message);
                    } else {

                        toastr.success(data.message);
                        window.location.href = "{{ route('get_cart') }}"

                    }
                }
            });
        }


        function updatecart(id) {

            var vall = '#quantity_' + id;
            var price = '#price_' + id;
            var qty = $(vall).val();
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: qty
                },
                success: function(data) {
                    if (data.success != 1) {
                        toastr.error(data.message);
                    } else {
                        // alert($(price).text());
                        $(price).text('$' + data.price);
                        $('#total_checkout').text(data.total + '$');
                        toastr.success(data.message);

                    }
                }


            });
        }
        $( ".send_mail" ).click(function() {
          var mail = $('#mail_sender').val();
          $.ajax({
                url: '{{ route('send_mail') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    email: mail,
                },
                success: function(data) {
                    if (data.success != 1) {
                        toastr.error(data.message);
                    } else {
                        toastr.success(data.message);
                        $('#mail_sender').val('')
                    }
                }
            });
        });


    </script>

</body>

</html>
