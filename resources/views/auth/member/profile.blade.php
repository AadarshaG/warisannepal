@extends('front.layouts.master')

@section('main-content')
    <section id="becomeMember">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="apply-img" src="{{asset('assets/front/img/applyimg.png')}}">
                </div>
                <div class="col-md-6">
                    <form id="contactForm" action="{{URL::to('witn/member/update',$profile->id)}}" method="post">
                        @csrf
                        <input type="hidden" class=""  value="">
                        <div class="form-div">
                            <div class="form-labeling">
                                Name
                            </div>
                            <input type="text" name="name" placeholder="Enter Full Name" value="{{$profile->name}}">
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Phone
                                    </div>
                                    <input type="number" name="phone" placeholder="Enter Contact Number" value="{{$profile->phone}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Email
                                    </div>
                                    <input type="email" name="email" placeholder="Enter Email Address" value="{{$profile->email}}" >
                                </div>
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Country
                                    </div>
                                    <input type="text" name="country" placeholder="Enter Country Name" value="{{$profile->country}}" >
                                </div>
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Province
                                    </div>
                                    <input type="text" name="province" placeholder="Enter Province Name" value="{{$profile->province}}">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        District
                                    </div>
                                    <input type="text" name="district" placeholder="Enter District Name" value="{{$profile->district}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-labeling">
                                        Date of Birth
                                    </div>
                                    <input type="date" name="dob" placeholder="Enter DOB" value="{{$profile->dob}}">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-labeling">
                                        Gender
                                    </div>
                                    @if($profile->gender == 'Male')
                                    <div class="custom-control custom-radio custom-control-inline">
                                            <i class="fa fa-mars"></i>Male
                                        </label>
                                    </div>
                                    @else
                                    <div class="custom-control custom-radio custom-control-inline">
                                            <i class="fa fa-venus"></i>Female
                                        </label>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-labeling">
                                        Profile Image
                                    </div>
                                    <input type="file" name="image">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-labeling">
                                    </div>
                                    @if(isset($profile))
                                        <img src="" width="60px;">
                                    @endif
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Education
                                    </div>
                                    <input type="text" name="education" placeholder="Enter Education Status" value="{{$profile->education}}" required>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-labeling">
                                        Marital Status
                                    </div>
                                    <select name="marital_status" class="form-control" required>
                                        <option value="{{$profile->marital_status}}">{{$profile->marital_status}}</option>
                                        <option selected disabled>-- Select --</option>
                                        <option value="UnMarried">UnMarried</option>
                                        <option value="Married">Married</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-div">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-labeling">
                                        Bio
                                    </div>
                                    <textarea type="text" name="bio" placeholder="Enter Your Bio" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="form-btn" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
