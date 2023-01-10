@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/pay_style.css') }}">
@endsection
@section('content')
    <div class="content pawWays">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Stripe</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Paypal</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="img-box">
                    <img src="https://woocommerce.com/wp-content/uploads/2011/12/stripe-logo-blue.png" alt="">
                </div>
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ get_general_value('STRIPE_KEY') }}"
                    id="payment-form">
                    @csrf
                    @guest
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-item required">
                                <label for="">User Name</label>
                                <input type="text" name="user_name"class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-item required">
                                <label for="">Email</label>
                                <input name="email" type='email' placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 required">
                            <div class="input-item">
                                <label for="">Phone</label>
                                <input name="phone" type='tel' placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    @endguest
                    <div class="required">
                        <label for="">Name on Card </label>
                        <input class='form-control' maxlength='20' type='text'>
                    </div>
                    <div class="required">
                        <label for="">Card Number</label>
                        <input autocomplete='off' class='form-control card-number' pattern="(\d{4}\s?){4}" maxlength='19'
                            type='text'>
                    </div>

                    <div class="">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="input-item-sm">
                                    <label for="">CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                        maxlength='3' type='text'>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="input-item-sm">
                                    <label for="">Expiration Month</label>
                                    <input class='form-control card-expiry-month MM' placeholder='MM' maxlength='2'
                                        type='text'>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="input-item-sm">
                                    <label for="">Expiration Year</label>
                                    <input class='form-control card-expiry-year YYYY' placeholder='YYYY' maxlength='4'
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <button class="btn btn-info btn goBay" type="submit">Go To Pay {{ $total }} $  </button>





                </form>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                <div class="img-box">
                    <img src="https://m.foolcdn.com/media/affiliates/original_images/PayPal_Logo.png" alt="">
                </div>

                <p>You will be redirected to the PayPal payment page.</p>

                <form action="{{ route('make.payment') }}" method="post">
                @csrf
                @guest
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-item required">
                            <label for="">User Name</label>
                            <input type="text" name="user_name"class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-item required">
                            <label for="">Email</label>
                            <input name="email" type='email' placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 required">
                        <div class="input-item">
                            <label for="">Phone</label>
                            <input name="phone" type='tel' placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                @endguest
                <button class="btn btn-info btn goBay" type="submit">Go To Pay {{ $total }} $  </button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{ asset('frontend/js/pay_main.js') }}"></script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $('.card-number').keyup(function(e) {

            // console.log(e.keyCode);
            if (e.keyCode !== 8) {
                if (this.value.length === 4 || this.value.length === 9 || this.value.length === 14) {
                    this.value = this.value += ' ';
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }


            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
