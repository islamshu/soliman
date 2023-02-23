@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">تعديل القائمة </h4>
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

                                <div class="card-body card-dashboard">
                                    @include('dashboard.parts._error')
                                    @include('dashboard.parts._success')

                                    <br>

                                    <form action="{{ route('menus.update',$menu->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                            <div class="com-md-6">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email"> عنوان  :</label>
                                                        <input type="text" required name="title" value="{{ $menu->title }}" class="form-control"  id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email"> الرابط  :</label>
                                                        <input type="text" required name="url" value="{{ $menu->url }}" class="form-control"  id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email"> هل هي قائمة رئيسية او فرعية  :</label>
                                                        <select class="form-control" required id="is_parnet">
                                                            <option value="" selected disabled>يرجى الاختيار</option>
                                                            <option value="1" @if($menu->menu_id == null) selected @endif>رئيسية</option>
                                                            <option value="0" @if($menu->menu_id != null) selected @endif>فرعية</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                {{ dd($menu->menu_id) }}
                                                <div id="show_parent" class="col-md-6" @if($menu->menu_id == null) style="display:none" @endif>
                                                    <div class="form-group">
                                                        <label for="email"> تابعة ل  :</label>
                                                        <select name="menu_id" class="form-control" id="menu_id">
                                                            <option value="">يرجى اختيار القائمة التابعة لها
                                                                @foreach ($menus as $item)
                                                                    <option value="{{ $item->id }}" @if($menu->is_menu == $item->id) selected @endif>{{ $item->title }}</option>
                                                                @endforeach
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit"  class="btn btn-info">حفظ</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
@section('script')


    <script>
        $( "#is_parnet" ).change(function() {
            var data = $('#is_parnet').val();
            if(data == 0){
                $("#show_parent").css("display", "block");
            }else{
                $('#menu_id').val('');
                $("#show_parent").css("display", "none");
            }
        });

        
    </script>
@endsection
