@extends('front.layouts.master')

@section('main-content')
    <section id="contactUs">
        <div class="container">
            <div class="section-title2">
                Contact us for more information
                @include('admin.section.message')
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form id="contactForm" action="{{route('send')}}" method="post">
                        @csrf
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Name
                                    </div>
                                    <input type="text" name="name" placeholder="Enter Full Name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Phone
                                    </div>
                                    <input type="number" name="phone"placeholder="Enter Contact Number" value="{{old('phone')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="form-labeling">
                                Email
                            </div>
                            <input type="email" name="email" placeholder="Enter Email Address" value="{{old('email')}}">
                        </div>
                        <div class="form-div">
                            <div class="form-labeling">
                                Query
                            </div>
                            <textarea name="message" placeholder="Write message" rows="4"></textarea>
                        </div>
                        <button class="form-btn" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <div class="contact-info-block">
                        <div class="section-title3">
                            Contact Info
                        </div>
                        <div class="contact-info-li">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-txt">
                                <div class="contact-info-label">
                                    Call
                                </div>
                                <div class="contact-info-number">
                                    {{$contact->phone}}
                                </div>
                            </div>
                        </div>
                        <div class="contact-info-li">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-txt">
                                <div class="contact-info-label">
                                    Email
                                </div>
                                <div class="contact-info-number">
                                    {{$contact->mail}}
                                </div>
                            </div>
                        </div>
                        <div class="contact-info-li">
                            <div class="contact-info-icon">
                                <i class="fa fa-directions"></i>
                            </div>
                            <div class="contact-info-txt">
                                <div class="contact-info-label">
                                    Get Direction
                                </div>
                                <div class="contact-info-number">
                                    {{$contact->address}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
