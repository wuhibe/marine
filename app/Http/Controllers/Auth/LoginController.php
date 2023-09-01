<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            DB::table('users')->where('id', '=', auth('admin')->user()->id)->update(['status' => 'active']);
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        if (auth('admin')->user()) {
            DB::table('users')->where('id', '=', auth('admin')->user()->id)->update(['status' => 'inactive']);
        }
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }
}
