@extends('layouts.admin')
@section('title','Image Page | WITN')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/witn/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Image Lists</h1></div>
                    <a href="{{route('rightimage.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Image</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Show On Front</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($rightimageData))
                        @foreach($rightimageData as $key=>$rightimageDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$rightimageDetail->title}}</td>
                                <td>
                                    @if($rightimageDetail->enabled == 1)
                                        Yes <a href="{{url('witn/disable/rightimage', $rightimageDetail->id)}}" class="btn btn-danger btn-xs">Hide From Front</a>
                                    @else
                                        No <a href="{{url('witn/enable/rightimage', $rightimageDetail->id)}}" class="btn btn-success btn-xs"> Show On Front</a>
                                    @endif

                                </td>
                                <td>
                                    <img src="{{asset('uploads/rightimage/'.$rightimageDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    <a href="{{route('rightimage.show',$rightimageDetail->id)}}" class="btn btn-primary show_rightimage" style="border-radius: 50%; margin-left:10px" data-id="{{$rightimageDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('rightimage.edit',$rightimageDetail->id)}}" class="btn btn-success edit_rightimage" style="border-radius: 50%; margin-left:10px" data-id="{{$rightimageDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('rightimage.destroy',$rightimageDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this rightimage?')",'class'=>"form pull-left"])}}
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
