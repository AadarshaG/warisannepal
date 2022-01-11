<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberData = Member::orderBy('id','desc')->get();
        return view('admin.frontdata.member',compact('memberData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memberDetail = Member::find($id);
        return view('admin.frontdata.showmember',compact('memberDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memberDetail = Member::find($id);
        $image = $memberDetail->image;
        $delete = $memberDetail->delete();
        if($delete){
            \File::delete('uploads/member'.'/'.$image);
            request()->session()->flash('success','Member Request deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Member Request could not be deleted at this moment.');
        }
        return redirect()->route('member.index');
    }

    public function enableMember($id)
    {
        $memberDetail = Member::find($id);
        $memberDetail->enabled = 1;
        $memberDetail->save();
        return redirect()->back()->with('success', 'Member Enabled Successfully');
    }

    public function disableMember($id)
    {
        $memberDetail = Member::find($id);
        $memberDetail->enabled = 0;
        $memberDetail->save();
        return redirect()->back()->with('success', 'Member Disabled Successfully');
    }
}
