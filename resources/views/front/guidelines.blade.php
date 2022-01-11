@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Community Guidelines
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $guideline->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
