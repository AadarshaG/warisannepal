@extends('layouts.admin')
@section('title','Admin Dashboard')

@section('main-content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <a href="{{route('message.index')}}">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body" style="color:#fff;">
                        <h2 class="m-b-5 font-strong">
                            @php
                                $count = \App\Models\Message::all();
                                echo $count->count();
                            @endphp
                        </h2>
                        <div class="m-b-5">TOTAL MESSAGES</div><i class="fa fa-envelope widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{route('member.index')}}">
                <div class="ibox bg-pink color-white widget-stat">
                    <div class="ibox-body" style="color:#fff;">
                        <h2 class="m-b-5 font-strong">
                            @php
                                $count = \App\Models\Member::all();
                                echo $count->count();
                            @endphp
                        </h2>
                        <div class="m-b-5">TOTAL REQUEST</div><i class="fa fa-users widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="ibox bg-primary color-white widget-stat">
                    <div class="ibox-body" style="color:#fff;">
                        <h2 class="m-b-5 font-strong">
                            @php
                                $count = \App\Models\Member::where('enabled','=','1')->get();
                                echo $count->count();
                            @endphp
                        </h2>
                        <div class="m-b-5">TOTAL ACCEPTED</div><i class="fa fa-users widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body" style="color:#fff;">
                        <h2 class="m-b-5 font-strong">
                            @php
                                $count = \App\Models\Member::where('enabled','!=','1')->get();
                                echo $count->count();
                            @endphp
                        </h2>
                        <div class="m-b-5">NEW REQUEST</div><i class="fa fa-users widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
