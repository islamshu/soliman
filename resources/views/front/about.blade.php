@extends('layouts.frontend')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
    </nav>
   </div>
   <div class="products">
    <div class="container">
       {!! get_general_value('about') !!}
    </div>
</div>

@endsection