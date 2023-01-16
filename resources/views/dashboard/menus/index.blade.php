@extends('layouts.backend')
@section('css')
    <style>
        .hidden{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">القوائم</h4>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        اضف قائمة جديدة
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> اضف قائمة جديدة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('menus.store') }}" method="post">
                                                        @csrf
                                                            <div class="com-md-6">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email"> عنوان  :</label>
                                                                        <input type="text" required name="title" class="form-control"  id="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email"> الرابط  :</label>
                                                                        <input type="text" name="url" required class="form-control"  id="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email"> هل هي قائمة رئيسية او فرعية  :</label>
                                                                        <select class="form-control" required id="is_parnet">
                                                                            <option value="" selected disabled>يرجى الاختيار</option>
                                                                            <option value="1" >رئيسية</option>
                                                                            <option value="0" >فرعية</option>
                                                                        </select>
                
                                                                    </div>
                                                                </div>
                                                                <div  id="show_parent" class="col-md-6" style="display: none">
                                                                    <div class="form-group">
                                                                        <label for="email"> تابعة ل  :</label>
                                                                        <select name="menu_id" class="form-control" id="menu_id">
                                                                            <option value="">يرجى اختيار القائمة التابعة لها
                                                                                @foreach ($menus as $item)
                                                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                                    </div> <br>


                                    <table class="table table-striped table-bordered zero-configuration" id="storestable">


                                        <br>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم القائمة </th>
                                                <th> القوائم التابعة لها</th>
                                                <th>الحالة</th>
                                                <th>الاجراءات </th>

                                            </tr>
                                        </thead>
                                        <tbody class="sort_menu">
                                            @foreach ($menus as $key => $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td> <i class="fa fa-bars handle" aria-hidden="true"></i></td>
                                                    <td>  <a href="{{ $item->url }}"> {{ $item->title }}</a></td>
                                                    <td>
                                                        @if($item->menus == '[]')
                                                        {{ "_" }}
                                                        @else
                                                        <button onClick="toggleTable({{ $item->id }})"> رؤية القوائم التابعة</button>

                                                      @endif
                                                      <table id="myTable_{{ $item->id }}"  style="width: 102%" class="hidden">

                                                        <tr>
                                                      
                                                          <td>الاسم</td>
                                                      
                                                          <td>الاجراءات</td> 
                                                      
                                                      
                                                        </tr>
                                                        @foreach ($item->menus as $itemm)
                                                        <tr>
                                                        <td>{{ $itemm->title }}</td>  
                                                        <td>
                                                            <a href="{{ route('menus.edit',$itemm->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                                            <form style="display: inline"
                                                            action="{{ route('menus.destroy', $itemm->id) }}"
                                                            method="post">
                                                            @method('delete') @csrf
                                                            <button type="submit" class="btn btn-danger delete-confirm"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form></td>  
                                                        </tr> 
                                                        @endforeach
                                                        
                                                      
                                                        
                                                      
                                                      
                                                      </table>

                                                    </td>

                                                    {{-- <td>{{ @$item->/menu->title != null ? $item->menu->title : "_" }} </td> --}}

                                                    <td>
                                                        <input type="checkbox" data-id="{{ $item->id }}" name="status"
                                                            class="js-switch allssee"
                                                            {{ $item->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('menus.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                        <form style="display: inline"
                                                            action="{{ route('menus.destroy', $item->id) }}"
                                                            method="post">
                                                            @method('delete') @csrf
                                                            <button type="submit" class="btn btn-danger delete-confirm"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>



                                                </tr>
                                               
                                                
                                            @endforeach

                                        </tbody>

                                    </table>
                                    
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
        $("#storestable").on("change", ".js-switch", function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let userId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('menus.update.status') }}',
                data: {
                    'status': status,
                    'menu_id': userId
                },
                success: function(data) {
                    console.log(data.message);
                }
            });
        });
        function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: '{{ route('menu_home_update') }}',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }
            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            });
            function toggleTable(id) {
                var id_table = 'myTable_'+id
        document.getElementById(id_table).classList.toggle("hidden");

        }
        
    </script>
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
