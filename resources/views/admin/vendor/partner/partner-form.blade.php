@extends('layouts.admin')
@section('title','Vendor/partner Page | WITN')
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
    <script>
        $('#services').summernote({
            height:100
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add_more').click(function(e){
                e.preventDefault();
                $('#main_div').append('<div class="form-div"> <div class="row"> <div class="col-md-4"> <div class="form-label"> </div><br> <input type="file" name="photo[]" multiple></div><div class="col-md-2"> <div class="form-label"> </div><button class="btn btn-danger minus_more">Remove</button></div> </div></div>');
            });
            $('#main_div').on('click',".minus_more",function(e){
                e.preventDefault();
                $(this).parent('div').prev().remove();
                $(this).parent('div').prev().remove();
                $(this).parent('div').remove();
            });
        });
    </script>
@endsection

@section('main-content')
    {{Form::open(['url'=>route('partner.store'), 'files'=>true, 'class'=>'form'])}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($partnerDetail) ? 'Update' : 'Add'}} Vendor/Partner</h1></div>
                    <a href="http://127.0.0.1:8000/witn/partner" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-label">
                                   <strong style="font-size:20px;">Country :</strong>
                                </div>
                                <select name="category_id" class="form-control"  required>
                                    <option selected disabled> -- Select Country --</option>
                                    @foreach($category as $count)
                                    <option value="{{$count->id}}">{{$count->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-7">
                                <div class="form-label">
                                   <strong style="font-size:20px;">Business Name:</strong>
                                </div>
                                <input type="text" name="title"  class="form-control" placeholder="Enter Business Name......" value="{{old('title')}}" required >
                                @error('title')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong style="font-size:20px;">Phone No.:</strong>
                                </div>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number....." value="{{old('phone')}}">
                                @error('phone')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-label">
                                   <strong style="font-size:20px;"> Business's Email:</strong>
                                </div>
                                <input type="email" name="email" placeholder="Enter Email Address...." class="form-control" value="{{old('email')}}">
                                @error('email')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong style="font-size:20px;"> Website Address:</strong>
                                </div>
                                <input type="text" name="website" class="form-control" placeholder="Enter Website Address....." value="{{old('website')}}">
                                @error('website')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong style="font-size:20px;">Business's Address:</strong>
                                </div>
                                <input type="text" name="address" placeholder="Enter Business Location...." class="form-control" value="{{old('address')}}">
                                @error('address')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong style="font-size:20px;"> Show On Front:</strong>
                                </div>
                                <select name="show_front">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong style="font-size:20px;">Offers:</strong>
                                </div>
                                <input type="text" name="offers" class="form-control" placeholder="Enter Offers.....">
                                @error('offers')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-label">
                                   <strong style="font-size:20px;"> Business Image:</strong>
                                </div>
                                <input type="file" name="image" >
                                @error('image')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-9">
                           <div class="form-label">
                              <strong style="font-size:20px;"> Services:</strong>
                           </div>
                           <textarea type="text" name="services" id="services" class="form-control"></textarea>
                           @error('services')
                           <span class="alert-danger">{{$message}}</span>
                           @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-label">
                                   <strong style="font-size:20px;">Business Description:</strong>
                                </div>
                                <textarea type="text" name="description" id="description" class="form-control"></textarea>
                                @error('description')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-div" id="main_div">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-label">
                                    <strong style="font-size:16px;"> Business Photo:</strong>
                                </div>
                                <input type="file" name="photo[]" multiple>
                                @error('photo')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="form-label">
                                </div>
                                <button class="btn btn-primary add_more"><i class="fa fa-plus"></i>Add More</button>
                            </div>
                        </div>
                    </div>
                    <br>
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
