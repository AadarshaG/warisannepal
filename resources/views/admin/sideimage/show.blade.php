@extends('layouts.admin')
@section('title','Image Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/witn/rightimage" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Image Detail</h1></div>
                    <a href="{{route('rightimage.edit',$rightimageDetail->id)}}" class="btn btn-success edit_rightimage" style="border-radius: 50%; margin-left:10px" data-id="{{$rightimageDetail->id}}">
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
                                <h4> Image</h4>
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/rightimage'.'/'.$rightimageDetail->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Image Title</strong> : {{ $rightimageDetail->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Image link</strong> : {{ $rightimageDetail->link }}
                        </li>
                        <li class="list-group-item">
                            <strong>Show On Front</strong> :
                            @if($rightimageDetail->enabled == 1)
                                Yes <a href="{{url('ewes/disable/rightimage', $rightimageDetail->id)}}" class="btn btn-danger btn-xs">Hide This Image</a>
                            @else
                                No <a href="{{url('ewes/enable/rightimage', $rightimageDetail->id)}}" class="btn btn-success btn-xs"> Show This Image</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $rightimageDetail->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $rightimageDetail->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
