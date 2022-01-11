@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Terms Of Service
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $term->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
