<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function store()
    {
        // logout user 
        auth()->logout();

        // redirect to login
        return redirect('/login');
    }
}
