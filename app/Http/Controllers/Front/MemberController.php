<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');

    }

    public function profile($id)
    {
        $profile = Member::select('*')->where('id',$id)->first();
        return view('auth.member.profile',compact('profile'));
    }



    public function profileupdate(Request $request,$id)
    {
        //dd($request->all());
        $request->validate([
            'education'=>'required|string',
            //'occupation'=>'required|string',
            'marital_status'=>'required|string',
            'bio'=>'required|string',
        ]);
        $member = Member::findOrFail($id);
        $data = $request->all();
        //dd($data);
        $member->education = $data['education'];
        //$member->occupation = $data['occupation'];
        $member->marital_status = $data['marital_status'];
        $member->bio = $data['bio'];
        $status = $member->save();
        if($status){
            return redirect()->back();
        }
    }
}
