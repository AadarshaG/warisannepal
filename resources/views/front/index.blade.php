@extends('front.layouts.master')

@section('main-content')
    <div class="main-body">

        <section id="homeSliderSection" class="home-padd">
            <div class="container">
                <div class="home-slider-grid">
                    @if(!empty($sliders))
                    <div class="main-slider">
                        <div class="owl-carousel owl-theme" id="homeSlider">
                            @foreach($sliders as $slider)
                            <div class="item">
                                <a href="">
                                    <img class="slider-img" src="{{asset('uploads/slider/'.$slider->image)}}">
                                    <div class="home-slider-text">
                                        <img class="slider-txt-logo" src="{{asset('uploads/slider/'.$slider->logo_image)}}">
                                        <div class="slider-title">
                                            {!! $slider->title !!}
                                        </div>
                                        <div class="slider-tagline">
                                            {!! $slider->description !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                             @endforeach
                        </div>
                    </div>
                    @endif
                    @if(!empty($rightimages))
                    <div class="slider-right-images">
                        @foreach($rightimages as $img)
                        <div>
                            <a href="{{$img->link}}">
                                <img src="{{asset('uploads/rightimage/'.$img->image)}}">
                            </a>
                        </div>
                            @endforeach
                    </div>
                     @endif
                </div>
            </div>
        </section>

        <section id="homeSearchBanner" style="background-image: url('{{asset('assets/front/img/bg1.png')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <form id="bannerSearchForm" action="{{route('search')}}" method="get">
                            @csrf
                            <div class="form-left">
                                <div class="form-label">
                                    Search
                                </div>
                                <div class="search-input">
                                    <input type="text" name="search" placeholder="vendors">
                                </div>
                            </div>
                            <div class="form-right">
                                <div class="form-label">
                                    Location
                                </div>
                                <div class="search-input">
                                    <input type="text" name="location" placeholder="Location">
                                </div>
                                <div class="search-btn">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="search-tags">
                            <a href="#">Thakali Foods</a>
                            <a href="#">Beverage Shop</a>
                            <a href="#">Grocery</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(!empty($about))
        <section id="perfectWay">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="desc-title">
                            {!! $about->title !!}
                        </div>
                        <div class="home-abt-text">
                           {!! $about->description !!}
                        </div>
                        <div class="home-counter">
                            <div class="row">
                                <div class="col-6">
                                    <div class="counter-block">
                                        <div class="counter-number">
                                            <span data-purecounter-end="{{$about->vendor_number}}" class="purecounter">0</span>+
                                        </div>
                                        <div class="counter-text">
                                            Verified Vendors
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-block">
                                        <div class="counter-number">
                                            <span data-purecounter-end="{{$about->country}}" class="purecounter">0</span>
                                        </div>
                                        <div class="counter-text">
                                            Countries
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-block">
                                        <div class="counter-number">
                                            <span data-purecounter-end="{{$about->users}}" class="purecounter">0</span>+
                                        </div>
                                        <div class="counter-text">
                                            Active Monthly Users
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-block">
                                        <div class="counter-number">
                                            <span data-purecounter-end="{{$about->discount}}" class="purecounter">0</span>+
                                        </div>
                                        <div class="counter-text">
                                            Items with NH Discount
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="text-center">
                            <img class="home-abt-img" src="{{asset('uploads/about/'.$about->image)}}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section id="topVendors">
            <div class="container">
                <div class="text-center">
                    <div class="section-title">
                        Top Vendors
                    </div>
                    <div class="section-tagline">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat
                    </div>
                </div>
                <div class="row">
                    @foreach($partners as $part)
                    <div class="col-sm-6 col-md-3">
                        <div class="vendor-card">
                            <div class="vendor-card-img">
                                <img src="{{asset('uploads/partner/'.$part->image)}}">
                            </div>
                            <div class="vendor-card-txt">
                                <a href="">
                                    <div class="vendor-card-title">
                                       {!! $part->title !!}
                                    </div>
                                    <div class="vendor-card-address">
                                        <i class="fa fa-map-marker-alt"></i>
                                        {!! $part->address !!}
                                    </div>
                                    <div class="vendor-card-phone">
                                        <i class="fa fa-phone"></i>
                                        {!! $part->phone !!}
                                    </div>
                                    <div class="vendor-card-offer">
                                        {!! $part->offers !!}
                                    </div>
                                    <div class="vendor-card-services">
                                        {!! $part->services !!}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
                <hr style="border-top: 2px solid #222;">
                <div class="text-center">
                    <a class="view-all-link" href="{{route('vendors')}}">View All Vendors</a>
                </div>
            </div>
        </section>

        @if(!empty($sale))
        <section id="saleSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img class="w-100" src="{{asset('uploads/sale/'.$sale->image)}}">
                    </div>
                    <div class="col-md-6 mt-auto">
                        <div class="desc-title">
                            {!! $sale->title !!}
                        </div>
                        <div class="desc-txt">
                            {!! $sale->description !!}
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="cashback-block">
                                    <div class="cashback-block-icon">
                                        <i class="fa fa-dollar-sign"></i>
                                    </div>
                                    <div class="cashback-block-txt">
                                        <div class="cashback-block-title">
                                            Cashback
                                        </div>
                                        <div class="cashback-block-desc">
                                            {{$sale->cashback}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cashback-block">
                                    <div class="cashback-block-icon">
                                        <i class="fa fa-percentage"></i>
                                    </div>
                                    <div class="cashback-block-txt">
                                        <div class="cashback-block-title">
                                            Discount
                                        </div>
                                        <div class="cashback-block-desc">
                                            {{$sale->discount}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cashback-block">
                                    <div class="cashback-block-icon">
                                        <i class="fa fa-coins"></i>
                                    </div>
                                    <div class="cashback-block-txt">
                                        <div class="cashback-block-title">
                                            Reward Points
                                        </div>
                                        <div class="cashback-block-desc">
                                            {{$sale->reward}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection
