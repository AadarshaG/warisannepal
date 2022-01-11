@extends('layouts.admin')
@section('title','About Data Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/witn/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>About Data Lists</h1></div>
                    <a href="{{route('aboutdata.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add About Data</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($aboutdataData))
                        @foreach($aboutdataData as $key=>$aboutdataDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{!! \Str::limit($aboutdataDetail->description,20) !!}</td>
                                <td>
                                    <img src="{{asset('uploads/aboutdata/'.$aboutdataDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    <a href="{{route('aboutdata.show',$aboutdataDetail->id)}}" class="btn btn-primary show_aboutdata" style="border-radius: 50%; margin-left:10px" data-id="{{$aboutdataDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('aboutdata.edit',$aboutdataDetail->id)}}" class="btn btn-success edit_aboutdata" style="border-radius: 50%; margin-left:10px" data-id="{{$aboutdataDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('aboutdata.destroy',$aboutdataDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this aboutdata?')",'class'=>"form pull-left"])}}
                                    @method('delete')
                                    {{Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-danger','style'=>'border-radius: 50%','type'=>'submit'])}}
                                    {{Form::close()}}
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
