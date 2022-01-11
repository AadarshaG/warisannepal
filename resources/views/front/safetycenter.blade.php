@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Safety Center
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $safety->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
