<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;
use Image;
use File;
class PartnerController extends Controller
{
    protected $partner = null;
    protected $category = null;
    public function __construct(Category $category, Partner $partner)
    {
        $this->category = $category;
        $this->partner = $partner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerData = $this->partner->getAll();
        return view('admin.vendor.partner.partner',compact('partnerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('*')->orderBy('title','asc')->get();
        return view('admin.vendor.partner.partner-form',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = $this->partner->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $photoName = array();
        $inputImages = $request->file('photo');
       //print_r($inputImages);
        //return;
        foreach ($inputImages as $imdImage)
        {
            $image1              = $imdImage;
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $namex              = time().'.' . $image1->getClientOriginalExtension();
            array_push($photoName,$namex);//->push($name1);
            $destinationPath1    = 'uploads/partner/';
            $ImageUpload1->save($destinationPath1.$namex);
        }
        $partner = new Partner();
        $partner->category_id = $request->category_id;
        $partner->title = $request->title;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->website = $request->website;
        $partner->address = $request->address;
        $partner->offers = $request->offers;
        $partner->description = $request->description;
        $partner->services = $request->services;
        $partner->image = $name;
        $partner->photo='';
        for($i=0; $i < count($photoName) ; $i++) {
            $partner->photo = $partner->photo.($partner->photo!=''?',':'').$photoName[$i];
        }
        $status = $partner->save();
        if($status){
            $request->session()->flash('success','Partner was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Partner could not be added at this moment.');
        }
        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partnerDetail = Partner::find($id);
        return view('admin.vendor.partner.show',compact('partnerDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partnerDetail = Partner::find($id);
        $category = Category::select('*')->orderBy('title','asc')->get();
        $images = explode(',',$partnerDetail->photo);
        return view('admin.vendor.partner.edit',compact('partnerDetail','category','images'));
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
        $partnerDetail = Partner::find($id);

        $rules = $this->partner->getRules('update');
        $request->validate($rules);

        $image1 = $partnerDetail->image;
        if($request->input("deletedImages"))
        {
            foreach (explode(",",$request->input("deletedImages")) as $delImage)
            {
                $partnerDetail->photo = str_replace(','.$delImage,'',$partnerDetail->photo);
                $partnerDetail->photo = str_replace($delImage.',','',$partnerDetail->photo);
                $partnerDetail->photo = str_replace($delImage,'',$partnerDetail->photo);
                File::delete('uploads/partner'.'/'.$delImage);

            }
        }
        if($request->hasFile('image')) {
            File::delete('uploads/partner'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $photoName = array();
        $inputImages = $request->file('photo');
        //print_r($inputImages);
        //return;
        foreach ($inputImages as $imdImage)
        {
            $image1              = $imdImage;
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $namex              = time().'.' . $image1->getClientOriginalExtension();
            array_push($photoName,$namex);//->push($name1);
            $destinationPath1    = 'uploads/partner/';
            $ImageUpload1->save($destinationPath1.$namex);
        }
        $partnerDetail->category_id = $request->category_id;
        $partnerDetail->title = $request->title;
        $partnerDetail->phone = $request->phone;
        $partnerDetail->email = $request->email;
        $partnerDetail->website = $request->website;
        $partnerDetail->address = $request->address;
        $partnerDetail->offers = $request->offers;
        $partnerDetail->description = $request->description;
        $partnerDetail->services = $request->services;
        $partnerDetail->image = $name;
        for($i=0; $i < count($photoName) ; $i++) {
            $partnerDetail->photo = $partnerDetail->photo.($partnerDetail->photo!=''?',':'').$photoName[$i];
        }
        $status = $partnerDetail->save();
        if($status){
            $request->session()->flash('success','Partner was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Partner could not be updated at this moment.');
        }
        return redirect()->route('partner.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partnerDetail = Partner::find($id);
        $image1 = $partnerDetail->image;
        $delete = $partnerDetail->delete();
        if($delete){
            \File::delete('uploads/partner'.'/'.$image1);
            request()->session()->flash('success','Partner deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Partner could not be deleted at this moment.');
        }
        return redirect()->route('partner.index');
    }
}
