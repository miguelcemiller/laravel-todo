<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // store
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'image_filename' => $request->file('image')->store('users', 'public')
        ]);

        // redirect
        return redirect()->route('login');
    }
}
