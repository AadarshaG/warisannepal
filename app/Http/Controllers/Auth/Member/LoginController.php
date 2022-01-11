<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:member')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.member.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (auth()->guard('member')->attempt($credentials)) {
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Email or password is wrong.']);
    }

    public function logout() {
        auth::guard('member')->logout();
        return redirect()->route('member.login');
    }
}
