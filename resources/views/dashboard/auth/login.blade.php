@extends('layouts.frontend')
@section('content')
<div class="content">
            
  <div class="sign-in Register">
      <img src="{{ asset('uploads/'.get_general_value('image')) }}" width="200" height="150" alt="">
      <h2>Login</h2>
      @include('dashboard.parts._error')
      @include('dashboard.parts._success')
      <form action="{{ route('login_dashboard_post') }}" method="post">
        @csrf
        <label for="">Email</label>
        <input class="form-control" value="{{ old('email') }}" required placeholder="Enter Your Email" type="email" name="email" id="">
        <label for="">Password</label>
        <input class="form-control" required placeholder="Enter  Password" type="password" name="password" id="">

      
          <button class="btn" type="submit">Login</button>

          <p>Dont have account ?<a href="{{ route('register') }}">Register</a></p>

      </form>
  </div>

</div>
@endsection