@extends('layouts.backend')
@section('content')
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control"> اعدادات الدفع  </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @include('dashboard.parts._error')
                                @include('dashboard.parts._success')

                                <form class="form" method="post" action="{{ route('get_setting_post') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                       
                                        <br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>STRIPE KEY  </label>
                                                <input type="string" name="general[STRIPE_KEY]"
                                                    value="{{ get_general_value('STRIPE_KEY') }}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>STRIPE SECRET  </label>
                                                <input type="string" name="general[STRIPE_SECRET]"
                                                    value="{{ get_general_value('STRIPE_SECRET') }}" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        
                                    
                                        <br>




                                        <br>


                                    </div>



                                    <div class="form-actions left">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> @lang('save')
                                        </button>
                                        </button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </section>

    </div>
@endsection
