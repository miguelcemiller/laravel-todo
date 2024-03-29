<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // authenticate user 
        auth()->attempt($request->only('username', 'password'), $request->remember);

        // redirect
        return redirect('/');
    }
}
