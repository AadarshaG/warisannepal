@extends('front.layouts.master')

@section('main-content')
    <section id="loginSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="login-img" src="{{asset('assets/front/img/login.png')}}">
                </div>
                <div class="col-md-5 my-auto">
                    <div class="login-right">
                        <div class="section-title4">
                            Login to access your Profile
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <form id="loginForm" action="{{route('member.login.post')}}" method="post">
                            @csrf
                            <div class="account-form-block">
                                <div class="account-form-label">
                                    Email
                                </div>
                                <div class="account-form-input">
                                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="account-form-block mb-1">
                                <div class="account-form-label">
                                    Password
                                </div>
                                <div class="account-form-input">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="account-form-block mb-1">
                                <div class="account-form-label">
                                </div>
                                <div class="account-form-input">
                                    <a href="{{route('member.request')}}" class="forgotpw">Forgot Password</a>
                                </div>
                            </div>
                            <button class="form-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
