<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'logout']);
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username'  => 'required|exists:admins',
        'password'  => 'required'
    ]); 


if (Auth::guard('admin')->attempt($credentials, $request->remeber)) {
    $request->session()->regenerate();
    return redirect()->intended( config('admin.path') );
}

return back()->withErrors([
    'username' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
]);
}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}
}
