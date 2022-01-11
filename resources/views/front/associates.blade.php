@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Associates
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $associate->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
