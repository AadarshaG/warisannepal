@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Law Enforcement
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $law->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
