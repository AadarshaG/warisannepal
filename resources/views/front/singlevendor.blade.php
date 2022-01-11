@extends('front.layouts.master')

@section('main-content')
    <section id="singleVendor">
        <div class="container">
            <div class="single-vendor-basic">
                <div class="row">
                    <div class="col-md-7">
                        <img class="w-100" src="{{asset('uploads/partner/'.$vendor->image)}}">
                    </div>
                    <div class="col-md-5 my-auto">
                        <div class="single-vendor-social">
                            <a class="facebook" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="linkedin" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="twitter" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="mail" href="">
                                <i class="far fa-envelope"></i>
                            </a>
                            <a class="whatsapp" href="">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                        <div class="single-vendor-title">
                            {!! $vendor->title !!}
                        </div>
                        <div class="single-vendor-contact-info">
                            <div class="vendor-contact-title">
                                Contact Information
                            </div>
                            <div class="vendor-contact-block bord">
                                <div class="vendor-contact-txt">
                                    <div class="vendor-contact-label">
                                        Call
                                    </div>
                                    <div class="vendor-info">
                                        {!! $vendor->phone !!}
                                    </div>
                                </div>
                                <div class="vendor-contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="vendor-contact-block bord">
                                <div class="vendor-contact-txt">
                                    <div class="vendor-contact-label">
                                        Email
                                    </div>
                                    <div class="vendor-info">
                                        {!! $vendor->email !!}
                                    </div>
                                </div>
                                <div class="vendor-contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="vendor-contact-block bord">
                                <div class="vendor-contact-txt">
                                    <div class="vendor-contact-label">
                                        URL
                                    </div>
                                    <div class="vendor-info">
                                        {!! $vendor->website !!}
                                    </div>
                                </div>
                                <div class="vendor-contact-icon">
                                    <i class="fa fa-external-link-alt"></i>
                                </div>
                            </div>
                            <div class="vendor-contact-block">
                                <div class="vendor-contact-txt">
                                    <div class="vendor-contact-label">
                                        Get Direction
                                    </div>
                                    <div class="vendor-info">
                                        {!! $vendor->address !!}
                                    </div>
                                </div>
                                <div class="vendor-contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-vendor-info">
                <div class="row">
                    <div class="col-md-7">
                        <div class="single-info-block">
                            <div class="single-info-title">
                                Introduction
                            </div>
                            <div class="single-info-desc">
                                {!! $vendor->description !!}
                            </div>
                        </div>
                        <div class="gray-bord"></div>
                        <div class="single-info-block">
                            <div class="single-info-title">
                                Services
                            </div>
                            <div class="single-info-desc">
                                {!! $vendor->services !!}
                            </div>
                        </div>
                        <div class="gray-bord"></div>
                        <div class="single-info-block">
                            <div class="single-info-title">
                                Offers
                            </div>
                            <div class="single-info-desc">
                                {!! $vendor->offers !!}
                            </div>
                        </div>
                        <div class="gray-bord"></div>
                        <div class="single-info-block">
                            <div class="single-info-title">
                                Photos
                            </div>
                            <div class="vendor-gallery">
                                @php
                                    $images = explode(',',$vendor->photo)
                                @endphp
                                @foreach($images as $pho)
                                <div class="gallery-item">
                                    <a href="{{asset('uploads/partner/'.$pho)}}" class="html5lightbox" data-group="gallery1" data-thumbnail="{{asset('uploads/partner/'.$pho)}}">
                                        <img src="{{asset('uploads/partner/'.$pho)}}">
                                    </a>
                                </div>
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
