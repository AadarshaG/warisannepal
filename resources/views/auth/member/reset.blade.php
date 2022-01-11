@extends('front.layouts.master')

@section('main-content')
    <section id="becomeMember">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="apply-img" src="{{asset('assets/front/img/applyimg.png')}}">
                </div>
                <div class="col-md-6">
                    <div class="section-title4">
                       Password Reset
                        @include('admin.section.message')
                    </div>
                    <form id="contactForm" action="{{route('member.password.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-div">
                            <div class="form-labeling">
                                Email
                            </div>
                            <input type="email" name="email">
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Password
                                    </div>
                                    <input type="password" name="password" placeholder="Enter Password" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Confirm password
                                    </div>
                                    <input type="password" name="password_confirmation" placeholder="Re-enter Password">
                                </div>
                            </div>
                        </div>
                        <button class="form-btn" type="submit">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
