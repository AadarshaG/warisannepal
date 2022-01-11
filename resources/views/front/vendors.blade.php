@extends('front.layouts.master')

@section('main-content')

    <section id="partnerCompany">
        <div class="container">
            <div class="text-center">
                <div class="section-title">
                    Our Partner Company
                </div>
                <div class="section-tagline">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat
                </div>
                @php
                    $vendors = DB::table('categories')->select('*')->get();
                @endphp
                @if(!empty($vendors))
                <div class="flags">
                    @foreach($vendors as $vendor)
                    <div class="flag-wrap">
                        <a href="{{route('vendorsid',$vendor->id)}}" class="active">
                            <img src="{{asset('uploads/category/'.$vendor->image)}}">
                            <div class="flag-title">
                                {{$vendor->title}}
                            </div>
                        </a>
                    </div>
                     @endforeach
                </div>
                 @endif
            </div>
        </div>
    </section>

    <div class="container">
        <div class="gray-bord"></div>
    </div>

    <section id="vendorsList">
        @if(!empty($partners))
            <div class="container">
                <div class="row">
                    @foreach($partners as $partner)
                        <div class="col-sm-6 col-md-3">
                            <div class="vendor-card">
                                <div class="vendor-card-img">
                                    <img src="{{asset('uploads/partner/'.$partner->image)}}">
                                </div>
                                <div class="vendor-card-txt">
                                    <a href="{{route('singleVendor',$partner->id)}}">
                                        <div class="vendor-card-title">
                                            {!! $partner->title !!}
                                        </div>
                                        <div class="vendor-card-address">
                                            <i class="fa fa-map-marker-alt"></i>
                                            New Baneshwor, Kathmandu
                                        </div>
                                        <div class="vendor-card-phone">
                                            <i class="fa fa-phone"></i>
                                            01-1234567
                                        </div>
                                        <div class="vendor-card-offer">
                                            15% on Food & Beverages
                                        </div>
                                        <div class="vendor-card-services">
                                            Parking Available, Free WIFI, Online Payment
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-3">
                    {{$partners->links()}}
                </div>
            </div>
        @endif
    </section>

@endsection
