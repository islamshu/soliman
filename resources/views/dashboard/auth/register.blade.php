@extends('layouts.frontend')
@section('content')
    <div class="content">

        <div class="sign-in Register">
            <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="200" height="150" alt="">
            <h2>Register</h2>
            @include('dashboard.parts._error')
            @include('dashboard.parts._success')
            <form action="{{ route('post_register') }}" method="post">
                @csrf
                <label for="">Name</label>
                <input class="form-control" required value="{{ old('name') }}" placeholder="Enter Your Name" type="text"
                    name="name" id="">
                <label for="">Email</label>
                <input class="form-control" required value="{{ old('email') }}" placeholder="Enter Your Email"
                    type="email" name="email" id="">
                <label for="">Phone</label>
                <input class="form-control" required value="{{ old('phone') }}"placeholder="Enter Your Phone"
                    type="tel" name="phone" id="">
                <label for="">Password</label>
                <input class="form-control" required placeholder="Enter  Password" type="password" name="password"
                    id="">
                <label for="">Confirm password</label>
                <input class="form-control" required placeholder="Enter confirm Password" type="password"
                    name="confirm_password" id="">

                <button class="btn" type="submit">Register</button>

                <p>aleardy have account ?<a href="{{ route('login') }}">SignIn</a></p>

            </form>
        </div>

    </div>
@endsection
