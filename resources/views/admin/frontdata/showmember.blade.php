@extends('layouts.admin')
@section('title','Request Member Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/witn/member" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Request Details</h1></div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover">
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h4> Image</h4>
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/member'.'/'.$memberDetail->image) }}" width="300px;">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Person Name</strong> : {{ $memberDetail->name }}
                        </li>
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Accept Request</strong> :
                            @if($memberDetail->enabled == 1)
                                Accepted <a href="{{url('witn/disable/member', $memberDetail->id)}}" class="btn btn-danger btn-xs">Declined Request</a>
                            @else
                                Declined <a href="{{url('witn/enable/member', $memberDetail->id)}}" class="btn btn-success btn-xs"> Accept Request</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Contact Number</strong> : {!! $memberDetail->phone  !!}
                        </li>
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Email</strong> : {!! $memberDetail->email  !!}
                        </li>
                        @if(isset($memberDetail))
                        <li class="list-group-item">
                            <strong style="font-size: 18px;"> Country</strong> : {!! $memberDetail->country  !!}
                        </li>
                        @endif
                        @if(isset($memberDetail))
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Province</strong> : {!! $memberDetail->province  !!}
                        </li>
                        @endif
                        @if(isset($memberDetail))
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">District</strong> : {!! $memberDetail->district !!}
                        </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">DOB</strong> : {{ \Carbon\Carbon::parse($memberDetail->dob)->format('M d, Y') }}
                            </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">Gender</strong> : {!! $memberDetail->gender !!}
                            </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">Education</strong> : {!! $memberDetail->education !!}
                            </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">Occupation</strong> : {!! $memberDetail->occupation !!}
                            </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">Marital Status</strong> : {!! $memberDetail->marital_status !!}
                            </li>
                        @endif
                        @if(isset($memberDetail))
                            <li class="list-group-item">
                                <strong style="font-size: 18px;">Bio</strong> : {!! $memberDetail->bio !!}
                            </li>
                        @endif
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Created</strong> : {{ $memberDetail->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong style="font-size: 18px;">Updated</strong> : {{ $memberDetail->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
