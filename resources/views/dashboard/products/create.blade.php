@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> اضف منتج جديد  </h4>
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

                                    <form  method="post" action="{{ route('prodcuts.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> صورة المنتج :<span style="color: red; size: 15px">*</span></label>
                                                    <input required type="file" class="form-control image" name="image"  id="">
                                                </div>
                                                <div class="form-group">
                                                    <img src="" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>
                                            </div>
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> اسم المنتج  :<span style="color: red; size: 15px">*</span></label>
                                                    <input type="text" required name="title" value="{{ old('title') }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> وصف المنتج  : <span style="color: red; size: 15px">*</span></label>
                                                    <textarea required name="description" id="" class="form-control ckeditor" cols="30" rows="5">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الفئة   :<span style="color: red; size: 15px">*</span></label>
                                                    <select required name="category_id" class="form-control" id="">
                                                        <option value="" disabled>اختر الفئة</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> سعر المنتج  :<span style="color: red; size: 15px">*</span></label>
                                                    <input type="text" required name="price" value="{{ old('price') }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> سعر المنتج بعد الخصم  :</label>
                                                    <input type="text" name="price_after_discount" value="{{ old('price_after_discount') }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> ميزات المنتج  :</label>
                                                <textarea name="penefit" id="" class="form-control" cols="30" rows="5">{{ old('penefit') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> متطلبات النظام:</label>
                                                <textarea name="system_requirements" id="" class="form-control" cols="30" rows="5">{{ old('system_requirements') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                  
                                        <button type="submit"  class="btn btn-info">حفظ</button>
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
