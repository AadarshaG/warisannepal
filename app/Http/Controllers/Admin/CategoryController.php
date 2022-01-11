<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use File;
class CategoryController extends Controller
{
    protected $category = null;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryData = Category::orderBy('id','desc')->get();
        return view('admin.vendor.category.category',compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.category.category-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->category->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/category/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $category = new Category();
        $category->title = $request->title;
        $category->image = $name;
        $status = $category->save();
        if($status){
            $request->session()->flash('success','Vendor Country was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Vendor Country could not be added at this moment.');
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryDetail = Category::find($id);
        return view('admin.vendor.category.category-form',compact('categoryDetail'));
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
        $categoryDetail = Category::find($id);
        $rules = $this->category->getRules('update');
        $request->validate($rules);

        $image = $categoryDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/category'.'/'.$image);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/category/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image;
        }

        $categoryDetail->title = $request->title;
        $categoryDetail->image = $name;
        $status = $categoryDetail->save();
        if($status){
            $request->session()->flash('success','Vendor Country was Updated successfully.');
        }else{
            $request->session()->flash('error','Sorry! Vendor Country could not be updated at this moment.');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryDetail = Category::find($id);
        $image1 = $categoryDetail->image;
        $delete = $categoryDetail->delete();
        if($delete){
            \File::delete('uploads/category'.'/'.$image1);
            request()->session()->flash('success','Vendor Country deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Vendor Country could not be deleted at this moment.');
        }
        return redirect()->route('category.index');
    }
}
