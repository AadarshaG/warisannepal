<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Member;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class PostController extends Controller
{
    public function contact()
    {
        $contact = Contact::select('*')->first();
        return view('front.contactus')->with([
            'contact'=>$contact
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string'
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;

        if($message->save()){
            $request->session()->flash('success', 'Message was successfully send.');
        } else {
            $request->session()->flash('error', 'Sorry! Message could not be send at this moment.');
        }
        return redirect()->back();
    }

    //apply online
    public function member()
    {
        return view('front.becomeamember');
    }
    public function sendRequest(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'country'=>'required|string',
            'province'=>'nullable|string',
            'district'=>'nullable|string',
            'dob'=>'required|date',
            'gender'=>'required',
        ]);
        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->country = $request->country;
        $member->province = $request->province;
        $member->district = $request->district;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $status = $member->save();
        if($status){
            $request->session()->flash('success', 'Request was successfully send.');
        } else {
            $request->session()->flash('error', 'Sorry! Request could not be send at this moment.');
        }
        return redirect()->back();
    }

    //social logins with register
    public function redirectfacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function callbackfacebook()
    {
        $getInfo = Socialite::driver('facebook')->stateless()->user();
        // print_r($getInfo);

        // OAuth Two Providers
        $token = $getInfo->token;
        $refreshToken = $getInfo->refreshToken; // not always provided
        $expiresIn = $getInfo->expiresIn;

        // OAuth One Providers
        $token = $getInfo->token;
        //$tokenSecret = $getInfo->tokenSecret;

        // All Providers
        $getInfo->getId();
        $getInfo->getNickname();
        $getInfo->getName();
        $getInfo->getEmail();
        $getInfo->getAvatar();

        $user = Member::where('provider_id', $getInfo->getId())->first();
        if ($user) {
            auth()->login($user);
            return redirect()->route('landing');

        }
        $email = Member::where('email',  $getInfo->getEmail())->first();
        if (!$email) {
            Member::create([
                'name' =>  $getInfo->getName(),
                'email' =>  $getInfo->getEmail(),
                'provider' => 'facebook',
                'provider_id' => $getInfo->getId(),
                'remember_token' => $token,
                'image'=> $getInfo->getAvatar(),

            ]);
        }

        return redirect()->route('landing');

    }

    public function redirectgoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackgoogle()
    {
        $getInfo = Socialite::driver('google')->stateless()->user();

        // OAuth Two Providers
        $token = $getInfo->token;
        $refreshToken = $getInfo->refreshToken; // not always provided
        $expiresIn = $getInfo->expiresIn;

        // OAuth One Providers
        $token = $getInfo->token;
        //$tokenSecret = $getInfo->tokenSecret;

        // All Providers
        $getInfo->getId();
        $getInfo->getNickname();
        $getInfo->getName();
        $getInfo->getEmail();
        $getInfo->getAvatar();

        $user = Member::where('provider_id', $getInfo->getId())->first();
        if ($user) {
            auth()->login($user);
            return redirect()->route('landing');

        }
        $email = Member::where('email',  $getInfo->getEmail())->first();
        if (!$email) {
            Member::create([
                'name' =>  $getInfo->getName(),
                'email' =>  $getInfo->getEmail(),
                'provider' => 'google',
                'provider_id' => $getInfo->getId(),
                'remember_token' => $token,
                'image'=> $getInfo->getAvatar(),

            ]);
        }

        return redirect()->route('landing');

    }
}
