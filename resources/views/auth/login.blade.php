@extends('layouts.auth.layout')

@section('content')

    <!-- Login Section Section Starts Here -->
    <div class="login-section padding-tb section-bg">
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">Login</h3>
                <form class="account-form" action="{{route('auth_login')}}" method="POST">
                    @csrf

                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-warning">:message</div>')) !!}
                    @endif

                    @if (session('error'))
                    <div class="alert alert-warning">{{session('error')}}</div>
                    @endif
                    
                    <div class="form-group">
                        <input required value="{{old('email')}}" type="text" placeholder="Email Address" name="email" class="@error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input required type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                            <div class="checkgroup">
                                <input type="checkbox" name="remember" value="{{old('remember')}}" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}">Forget Password?</a>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="d-block lab-btn"><span>Submit Now</span></button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block cate pt-10">Don’t Have any Account?  <a href="#">Please visit the department secretary</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->

@endsection
