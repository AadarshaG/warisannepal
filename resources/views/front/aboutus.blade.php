@extends('front.layouts.master')

@section('main-content')

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

    <section id="aboutUs">
        <div class="container">
            <div class="abt-block">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                q
            </div>
            @foreach($datas as $data)
            <div class="abt-block">
                <div class="row">
                    <div class="col-md-7">
                       {!! $data->description !!}
                    </div>
                    <div class="col-md-5">
                        <img class="w-100" src="{{asset('uploads/aboutdata/'.$data->image)}}">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="abt-block">
                <div class="row">
                    <div class="col-md-5">
                        <img class="w-100" src="{{asset('assets/front/img/vendor.png')}}">
                    </div>
                    <div class="col-md-7">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
