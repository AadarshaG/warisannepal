@extends('front.layouts.master')

@section('main-content')
    <section id="vendorsList">
        <div class="container">
            @if(!empty($results))
            <div class="row">
                @forelse($results as $result)
                <div class="col-sm-6 col-md-3">
                    <div class="vendor-card">
                        <div class="vendor-card-img">
                            <img src="{{asset('uploads/partner/'.$result->image)}}">
                        </div>
                        <div class="vendor-card-txt">
                            <a href="">
                                <div class="vendor-card-title">
                                    {{$result->title}}
                                </div>
                                <div class="vendor-card-address">
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{$result->address}}
                                </div>
                                <div class="vendor-card-phone">
                                    <i class="fa fa-phone"></i>
                                    {{$result->phone}}
                                </div>
                                <div class="vendor-card-offer">
                                    {!! $result->offers !!}
                                </div>
                                <div class="vendor-card-services">
                                    {!! $result->services !!}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Result Found.</h4>
                    </div>
                @endforelse
            </div>
            <div class="my-3">
               {{$results->links()}}
            </div>
            @endif
        </div>
    </section>
@endsection
