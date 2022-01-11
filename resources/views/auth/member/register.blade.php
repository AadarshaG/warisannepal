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
                        Become a member
                        @include('admin.section.message')
                    </div>
                    <div class="social-signup">
                        <div>
                            <a href="{{ URL::to('/social/facebook') }}" class="facebook-signup">
                                <img src="{{asset('assets/front/img/facebook.png')}}">
                                Sign Up with Facebook
                            </a>
                        </div>
                        <div>
                            <a href="{{ URL::to('/social/google') }}" class="google-signup">
                                <img src="{{asset('assets/front/img/google.png')}}">
                                Sign Up with Google
                            </a>
                        </div>
                    </div>
                    <div class="section-title5">
                        <em>-Or-</em>
                    </div>
                    <form id="contactForm" action="{{route('member.register.post')}}" method="post">
                        @csrf
                        <div class="form-div">
                            <div class="form-labeling">
                                Name
                            </div>
                            <input type="text" name="name" placeholder="Enter Full Name" value="{{old('name')}}" required>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Phone
                                    </div>
                                    <input type="number" name="phone" placeholder="Enter Contact Number" value="{{old('phone')}}" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Email
                                    </div>
                                    <input type="email" name="email" placeholder="Enter Email Address" value="{{old('email')}}" required>
                                </div>
                            </div>
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
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Country
                                    </div>
                                    <input type="text" name="country" placeholder="Enter Country Name" value="{{old('country')}}" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Province
                                    </div>
                                    <input type="text" name="province" placeholder="Enter Province Name" value="{{old('province')}}">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        District
                                    </div>
                                    <input type="text" name="district" placeholder="Enter District Name" value="{{old('district')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Date of Birth
                                    </div>
                                    <input type="date" name="dob" placeholder="Enter DOB" value="{{old('dob')}}" required>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-labeling">
                                        Gender
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="gender" value="Male">
                                        <label class="custom-control-label" for="customRadio">
                                            <i class="fa fa-mars"></i>Male
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="Female">
                                        <label class="custom-control-label" for="customRadio2">
                                            <i class="fa fa-venus"></i>Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="form-btn" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
