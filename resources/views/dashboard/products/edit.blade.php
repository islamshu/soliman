@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">   تعديل المنتج :  {{ $product->title }}  </h4>
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

                                    <form  method="post" action="{{ route('prodcuts.update',$product->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> صورة المنتج :</label>
                                                    <input  type="file" class="form-control image" name="image"  id="">
                                                </div>
                                                <div class="form-group">
                                                    <img src="{{ asset('uploads/'.$product->image) }}" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>
                                            </div>
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> اسم المنتج  :</label>
                                                    <input type="text" required name="title" value="{{ $product->title }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> وصف المنتج  :</label>
                                                    <textarea required name="description" id="" class="form-control" cols="30" rows="5">{{ $product->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الفئة   :</label>
                                                    <select required name="category_id" class="form-control" id="">
                                                        <option value="" disabled>اختر الفئة</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}" @if($product->category_id == $item->id) selected @endif>{{ $item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> سعر المنتج  :</label>
                                                    <input type="text" required name="price" value="{{ $product->price }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> سعر المنتج بعد الخصم  :</label>
                                                    <input type="text" name="price_after_discount" value="{{ $product->price_after_discount  }}" class="form-control"  id="">
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> ميزات المنتج  :</label>
                                                <textarea name="penefit" id="" class="form-control" cols="30" rows="5">{{ $product->penefit  }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> متطلبات النظام:</label>
                                                <textarea name="system_requirements" id="" class="form-control" cols="30" rows="5">{{ $product->system_requirements }}</textarea>
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
