<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rightimage;
use Illuminate\Http\Request;
use Image;
use File;
class RightimageController extends Controller
{
    protected $rightimage = null;
    public function __construct(Rightimage $rightimage)
    {
        $this->rightimage = $rightimage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rightimageData = Rightimage::orderBy('id','desc')->get();
        return view('admin.sideimage.sideimage',compact('rightimageData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sideimage.sideimage-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->rightimage->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/rightimage/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $rightimage = new Rightimage();
        $rightimage->title = $request->title;
        $rightimage->link = $request->link;
        $rightimage->image = $name;
        $status = $rightimage->save();
        if($status){
            $request->session()->flash('success','Side Image was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Side Image could not be added at this moment.');
        }
        return redirect()->route('rightimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rightimageDetail = Rightimage::find($id);
        return view('admin.sideimage.show',compact('rightimageDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rightimageDetail = Rightimage::find($id);
        return view('admin.sideimage.sideimage-form',compact('rightimageDetail'));
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
        $rightimageDetail = Rightimage::find($id);
        $rules = $this->rightimage->getRules('update');
        $request->validate($rules);

        $image1 = $rightimageDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/rightimage'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/rightimage/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $rightimageDetail->title = $request->title;
        $rightimageDetail->link = $request->link;
        $rightimageDetail->image = $name;
        $status = $rightimageDetail->save();
        if($status){
            $request->session()->flash('success','Side Image was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Side Image could not be updated at this moment.');
        }
        return redirect()->route('rightimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rightimageDetail = Rightimage::find($id);
        $image1 = $rightimageDetail->image;
        $delete = $rightimageDetail->delete();
        if($delete){
            \File::delete('uploads/rightimage'.'/'.$image1);
            request()->session()->flash('success','Side Image deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Side Image could not be deleted at this moment.');
        }
        return redirect()->route('rightimage.index');
    }

    public function enableRightimage($id)
    {
        $rightimageDetail = Rightimage::find($id);
        $rightimageDetail->enabled = 1;
        $rightimageDetail->save();
        return redirect()->back()->with('success', 'Side Image Enabled Successfully');
    }

    public function disableRightimage($id)
    {
        $rightimageDetail = Rightimage::find($id);
        $rightimageDetail->enabled = 0;
        $rightimageDetail->save();
        return redirect()->back()->with('success', 'Side Image Disabled Successfully');
    }
}
