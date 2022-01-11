<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Aboutdata;
use Illuminate\Http\Request;
use Image;
use FIle;
class AboutdataController extends Controller
{
    protected $aboutdata = null;
    public function __construct(Aboutdata $aboutdata)
    {
        $this->aboutdata = $aboutdata;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutdataData = Aboutdata::orderBy('id','desc')->get();
        return view('admin.aboutdata.index',compact('aboutdataData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutdata.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->aboutdata->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/aboutdata/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $aboutdata = new Aboutdata();
        $aboutdata->description = $request->description;
        $aboutdata->image = $name;
        $status = $aboutdata->save();
        if($status){
            $request->session()->flash('success','About Data was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! About Data could not be added at this moment.');
        }
        return redirect()->route('aboutdata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutdataDetail = Aboutdata::find($id);
        return view('admin.aboutdata.show',compact('aboutdataDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutdataDetail = Aboutdata::find($id);
        return view('admin.aboutdata.form',compact('aboutdataDetail'));
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
        $aboutdataDetail = Aboutdata::find($id);

        $rules = $this->aboutdata->getRules('update');
        $request->validate($rules);
        $image1 = $aboutdataDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/aboutdata'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/aboutdata/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $aboutdataDetail->description = $request->description;
        $aboutdataDetail->image = $name;
        $status = $aboutdataDetail->save();
        if($status){
            $request->session()->flash('success','About Data was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! About Data could not be updated at this moment.');
        }
        return redirect()->route('aboutdata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutdataDetail = Aboutdata::find($id);
        $image1 = $aboutdataDetail->image;
        $delete = $aboutdataDetail->delete();
        if($delete){
            \File::delete('uploads/aboutdata'.'/'.$image1);
            request()->session()->flash('success','About Data deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! About Data could not be deleted at this moment.');
        }
        return redirect()->route('aboutdata.index');
    }
}
