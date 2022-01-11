@extends('layouts.admin')
@section('title','Vendors/Partner Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/witn/partner" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Vendors/Partner</h1></div>
                    <a href="{{route('partner.edit',$partnerDetail->id)}}" class="btn btn-success edit_partner" style="border-radius: 50%; margin-left:10px" data-id="{{$partnerDetail->id}}">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover">
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h4>Image</h4>
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/partner'.'/'.$partnerDetail->image) }}" width="100%">
                            </div>
                        </div>
                        <br>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h4>Photo Images</h4>
                            </div>
                            <div class="box-body">
                                <img src="" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Country</strong> : {!! $partnerDetail->category_id !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Title</strong> : {!! $partnerDetail->title  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Phone</strong> : {!! $partnerDetail->phone  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Email</strong> : {!! $partnerDetail->email  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Website</strong> : {!! $partnerDetail->website  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Address</strong> : {!! $partnerDetail->address  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Offers</strong> : {!! $partnerDetail->offers  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Services</strong> : {!! $partnerDetail->services  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $partnerDetail->description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $partnerDetail->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $partnerDetail->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
