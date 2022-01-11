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
                        Forgot Password
                        @include('admin.section.message')
                    </div>
                    <form id="contactForm" action="{{route('member.email')}}" method="post">
                        @csrf
                        <div class="form-div">
                            <div class="form-labeling">
                                Email
                            </div>
                            <input type="email" name="email" placeholder="Enter Email" value="{{old('email')}}" required>
                        </div>
                        <button class="form-btn" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
