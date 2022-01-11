<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Image;
use File;
class PolicyController extends Controller
{
    protected $policy = null;
    public function __construct(Policy $policy)
    {
        $this->policy = $policy;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyData = Policy::all();
        return view('admin.policy.index',compact('policyData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->policy->getRules();
        $request->validate($rules);

        $policy = new Policy();
        $policy->title = $request->title;
        $policy->description = $request->description;
        $status = $policy->save();
        if($status){
            $request->session()->flash('success','Policy Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Policy Page could not be added at this moment.');
        }
        return redirect()->route('policy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $policyDetail = Policy::find($id);
        return view('admin.policy.show',compact('policyDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policyDetail = Policy::find($id);
        return view('admin.policy.edit',compact('policyDetail'));
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
        $policyDetail = Policy::find($id);

        $rules = $this->policy->getRules('update');
        $request->validate($rules);

        $policyDetail->description = $request->description;
        $status = $policyDetail->save();
        if($status){
            $request->session()->flash('success','Policy Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Policy Page could not be updated at this moment.');
        }
        return redirect()->route('policy.index');
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
