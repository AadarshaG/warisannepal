<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Image;
use File;
class SaleController extends Controller
{
    protected $sale = null;
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleData = Sale::all();
        return view('admin.sale.sale',compact('saleData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sale.sale-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->sale->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/sale/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $sale = new Sale();
        $sale->title = $request->title;
        $sale->description = $request->description;
        $sale->cashback = $request->cashback;
        $sale->discount = $request->discount;
        $sale->reward = $request->reward;
        $sale->image = $name;
        $status = $sale->save();
        if($status){
            $request->session()->flash('success','Index Sale was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Index Sale could not be added at this moment.');
        }
        return redirect()->route('sale.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saleDetail = Sale::find($id);
        return view('admin.sale.show',compact('saleDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saleDetail = Sale::find($id);
        return view('admin.sale.sale-form',compact('saleDetail'));
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
        $saleDetail = Sale::find($id);
        $rules = $this->sale->getRules('update');
        $request->validate($rules);

        $image1 = $saleDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/sale'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/sale/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $saleDetail->title = $request->title;
        $saleDetail->description = $request->description;
        $saleDetail->cashback = $request->cashback;
        $saleDetail->discount = $request->discount;
        $saleDetail->reward = $request->reward;
        $saleDetail->image = $name;
        $status = $saleDetail->save();
        if($status){
            $request->session()->flash('success','Index Sale was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Index Sale could not be updated at this moment.');
        }
        return redirect()->route('sale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
