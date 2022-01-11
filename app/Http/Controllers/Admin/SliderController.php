<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use File;
class SliderController extends Controller
{
    protected $slider = null;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderData = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliderData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->slider->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('logo_image')) {
            $logo_image              = $request->file('logo_image');
            $ImageUpload1        = Image::make($logo_image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $logo_name              = time().'.' . $logo_image->getClientOriginalExtension();
            $destinationPath1    = 'uploads/slider/';
            $ImageUpload1->save($destinationPath1.$logo_name);
        }else{
            $logo_name = '';
        }
        $slider = new Slider();
        $slider->image = $name;
        $slider->logo_image = $logo_name;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $status = $slider->save();
        if($status){
            $request->session()->flash('success','Home SLider was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Home SLider could not be added at this moment.');
        }
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sliderDetail = Slider::find($id);
        return view('admin.slider.show',compact('sliderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliderDetail = Slider::find($id);
        return view('admin.slider.edit',compact('sliderDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sliderDetail = Slider::find($id);

        $rules = $this->slider->getRules('update');
        $request->validate($rules);

        $image1 = $sliderDetail->image;
        $logoimage = $sliderDetail->logo_image;
        if($request->hasFile('image')) {
            File::delete('uploads/slider'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        if($request->hasFile('logo_image')) {
            File::delete('uploads/slider'.'/'.$logoimage);
            $logo_image             = $request->file('logo_image');
            $ImageUpload        = Image::make($logo_image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $logo_name               = time().'.' . $logo_image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$logo_name);
        }else{
            $logo_name = $logoimage;
        }
        $sliderDetail->image = $name;
        $sliderDetail->logo_image = $logo_name;
        $sliderDetail->title = $request->title;
        $sliderDetail->description = $request->description;
        $sliderDetail->link = $request->link;
        $status = $sliderDetail->save();
        if($status){
            $request->session()->flash('success','Home SLider was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Home SLider could not be updated at this moment.');
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliderDetail = Slider::find($id);
        $image1 = $sliderDetail->image;
        $logoimage1 = $sliderDetail->logo_image;
        $delete = $sliderDetail->delete();
        if($delete){
            \File::delete('uploads/slider'.'/'.$image1);
            \File::delete('uploads/slider'.'/'.$logoimage1);
            request()->session()->flash('success','Home Slider deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Home Slider could not be deleted at this moment.');
        }
        return redirect()->route('slider.index');
    }

    public function enableSlider($id)
    {
        $sliderDetail = Slider::find($id);
        $sliderDetail->enabled = 1;
        $sliderDetail->save();
        return redirect()->back()->with('success', 'Slider Enabled Successfully');
    }

    public function disableSlider($id)
    {
        $sliderDetail = Slider::find($id);
        $sliderDetail->enabled = 0;
        $sliderDetail->save();
        return redirect()->back()->with('success', 'Slider Disabled Successfully');
    }
}
