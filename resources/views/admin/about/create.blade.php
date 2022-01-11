@extends('layouts.admin')
@section('title','Add About Page | WITN')
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
            height:150
        });
    </script>
@endsection

@section('main-content')
    {{Form::open(['url'=>route('about.store'), 'files'=>true, 'class'=>'form'])}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($aboutDetail) ? 'Update' : 'Add'}} About Us</h1></div>
                    <a href="http://127.0.0.1:8000/witn/about" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('title','About Title :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('title',@$aboutDetail->title,['class'=>'form-control form-control-md','id'=>'title','required'=>true,'placeholder'=>'Enter About Title........'])}}
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
                        {{Form::label('vendor_number','Verified Vendors:',['class'=>'col-md-3'])}}
                        <div class="col-md-6">
                            {{Form::number('vendor_number',@$aboutDetail->vendor_number,['class'=>'form-control form-control-md','id'=>'vendor_number','required'=>false,'placeholder'=>'Enter number of Verified vendors........'])}}
                            @error('vendor_number')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('country','No. of Country:',['class'=>'col-md-3'])}}
                        <div class="col-md-6">
                            {{Form::number('country',@$aboutDetail->country,['class'=>'form-control form-control-md','id'=>'country','required'=>false,'placeholder'=>'Enter number of country........'])}}
                            @error('country')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('users','No. of Users:',['class'=>'col-md-3'])}}
                        <div class="col-md-6">
                            {{Form::number('users',@$aboutDetail->users,['class'=>'form-control form-control-md','id'=>'users','required'=>false,'placeholder'=>'Enter number of users........'])}}
                            @error('users')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('discount','Items With NH Discount:',['class'=>'col-md-3'])}}
                        <div class="col-md-6">
                            {{Form::number('discount',@$aboutDetail->discount,['class'=>'form-control form-control-md','id'=>'discount','required'=>false,'placeholder'=>'Enter items with NH discount........'])}}
                            @error('discount')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('description',' Description :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::textarea('description',@$aboutDetail->description,['class'=>'form-control form-control-md','id'=>'description','required'=>false,'placeholder'=>'Enter  Description........','rows'=>5,'style'=>'resize:none'])}}
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
        <div class="col-md-9">*Required Image of jpg,jpeg,png,svg,gif</div>
    </div>
    {{Form::close()}}
@endsection
