@extends('layouts.admin')
@section('title','Add Testimonal Page | WITN')
@section('styles')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script>
        $('#description').summernote({
            height:100
        });
    </script>
@endsection

@section('main-content')
    {{Form::open(['url'=>route('testimonal.store'), 'files'=>true, 'class'=>'form'])}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($testimonalDetail) ? 'Update' : 'Add'}} Testimonal</h1></div>
                    <a href="http://127.0.0.1:8000/witn/testimonal" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('title',' Client Name :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('title',@$testimonalDetail->title,['class'=>'form-control form-control-md','id'=>'title','required'=>true,'placeholder'=>'Enter Client Name........'])}}
                            @error('title')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('image','Image * :',['class'=>'col-md-3'])}}
                        <div class="col-md-5">
                            {{Form::file('image',['id'=>'image','accept'=>'image/*'])}}
                            @error('image')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('description',' Description :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::textarea('description',@$testimonalDetail->description,['class'=>'form-control form-control-md','id'=>'description','required'=>false,'placeholder'=>'Enter  Description........','rows'=>5,'style'=>'resize:none'])}}
                            @error('description')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        {{Form::label('','',['class'=>'col-md-3'])}}
        <div class="col-md-9">
            {{Form::button("<i class='fa fa-trash'></i> Reset",['class'=>'btn btn-danger','type'=>'reset'])}}
            {{Form::button("<i class='fa fa-paper-plane'></i> Submit",['class'=>'btn btn-success','type'=>'submit'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for=""></label>
        </div>
        <div class="col-md-9">*Required image of jpg,jpeg,png,svg,gif</div>
    </div>
    {{Form::close()}}
@endsection
