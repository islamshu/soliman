@extends('layouts.frontend')
@section('content')
<div class="content">
            
  <div class="sign-in Register">
      <img src="{{ asset('uploads/'.get_general_value('image')) }}" width="200" height="150" alt="">
      <h2>Track your Order</h2>
      @include('dashboard.parts._error')
      @include('dashboard.parts._success')
      <form action="{{ route('track_order_post') }}" method="post">
        @csrf
        <label for="">Order Number</label>
        <input class="form-control" value="{{ old('code') }}" required placeholder="Enter Your code" type="text" name="code" >
        

      
          <button class="btn" type="submit">Track</button>


      </form>
  </div>

</div>
@endsection