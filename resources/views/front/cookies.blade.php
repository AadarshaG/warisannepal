@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Cookies Policy
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $cookies->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
