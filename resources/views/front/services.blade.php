@extends('front.layouts.master')

@section('main-content')
    <section id="aboutUs">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="service-intro">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    </div>
                </div>
            </div>
            @foreach($services as $service)
            <div class="service-block">
                <div class="service-title">
                    {!! $service->title !!}
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="service-desc">
                            {!! $service->description !!}
                        </div>

                    </div>
                    <div class="col-md-5">
                        <img class="w-100" src="{{asset('uploads/service/'.$service->image)}}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
