@extends('front.layouts.master')

@section('main-content')
    <section id="clientDetail">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6 my-auto">
                    <div class="section-title2">
                        Clients
                    </div>
                    <div class="client-detail-txt">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                <div class="col-md-5">
                    <img class="client-img" src="{{asset('assets/front/img/woman.png')}}">
                </div>
            </div>
        </div>
    </section>

    <section id="clientMsgList">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    @foreach($clients as $client)
                    <div class="client-block">
                        <div class="client-block-img">
                            <img src="{{asset('uploads/testimonal/'.$client->image)}}">
                        </div>
                        <div class="client-block-txt">
                            <div class="client-block-name">
                                {!! $client->title !!}
                            </div>
                            <div class="client-block-msg">
                                {!! $client->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="client-block">
                        <div class="client-block-txt-left">
                            <div class="client-block-name">
                                Client 2
                            </div>
                            <div class="client-block-msg">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                        <div class="client-block-img-right">
                            <img src="{{asset('assets/front/img/c2.png')}}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
