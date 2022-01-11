<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonal;
use Illuminate\Http\Request;
use Image;
use File;
class TestimonalController extends Controller
{
    protected $testimonal = null;
    public function __construct(Testimonal $testimonal)
    {
        $this->testimonal = $testimonal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonalData = Testimonal::orderBy('id','desc')->get();
        return view('admin.testimonal.index',compact('testimonalData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->testimonal->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/testimonal/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $testimonal = new Testimonal();
        $testimonal->title = $request->title;
        $testimonal->description = $request->description;
        $testimonal->image = $name;
        $status = $testimonal->save();
        if($status){
            $request->session()->flash('success','Testimonal Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Testimonal Page could not be added at this moment.');
        }
        return redirect()->route('testimonal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonalDetail = Testimonal::find($id);
        return view('admin.testimonal.show',compact('testimonalDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonalDetail = Testimonal::find($id);
        return view('admin.testimonal.edit',compact('testimonalDetail'));
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
        $testimonalDetail = Testimonal::find($id);

        $rules = $this->testimonal->getRules('update');
        $request->validate($rules);

        $image1 = $testimonalDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/testimonal'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/testimonal/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $testimonalDetail->title = $request->title;
        $testimonalDetail->description = $request->description;
        $testimonalDetail->image = $name;
        $status = $testimonalDetail->save();
        if($status){
            $request->session()->flash('success','Testimonal Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Testimonal Page could not be updated at this moment.');
        }
        return redirect()->route('testimonal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonalDetail = Testimonal::find($id);
        $image1 = $testimonalDetail->image;
        $delete = $testimonalDetail->delete();
        if($delete){
            \File::delete('uploads/testimonal'.'/'.$image1);
            request()->session()->flash('success','Testimonal Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Testimonal Page could not be deleted at this moment.');
        }
        return redirect()->route('testimonal.index');
    }
}
