@extends('layouts.admin')
@section('title','Sale Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/witn/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Index Sale</h1></div>
                    <a href="{{route('sale.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Sale</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($saleData))
                        @foreach($saleData as $key=>$saleDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$saleDetail->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/sale/'.$saleDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    <a href="{{route('sale.show',$saleDetail->id)}}" class="btn btn-primary show_sale" style="border-radius: 50%; margin-left:10px" data-id="{{$saleDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('sale.edit',$saleDetail->id)}}" class="btn btn-success edit_sale" style="border-radius: 50%; margin-left:10px" data-id="{{$saleDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
