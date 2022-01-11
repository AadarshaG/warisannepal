<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterForm(){
        return view('auth.member.register');
    }

    public function register(Request $request){
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


        $data = $request->all();

        Member::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'country'=>$data['country'],
            'province'=>$data['province'],
            'district'=>$data['district'],
            'dob'=>$data['dob'],
            'gender'=>$data['gender']
        ]);
        return redirect()->route('member.login');
    }
}
