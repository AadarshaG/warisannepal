@extends('front.layouts.master')

@section('main-content')
    <section id="textPages">
        <div class="container">
            <div class="section-title2">
                Privacy Policy
            </div>
            <div class="text-page-txt">
                <p>
                    {!! $privacy->description !!}
                </p>
            </div>
        </div>
    </section>
@endsection
