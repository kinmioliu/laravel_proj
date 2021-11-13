<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with("success", 'GoodBye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function verify()
    {
        $attributes = request()->validate([
            'username' => 'required|exists:users,email',
            'password' => 'required'
        ]);



        if (auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                ['email' => 'email error']
            ]);    
        }

        session()->regenerate();
        
        return redirect('/')->with('success', 'Welcome Back!');

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'email error']);
    }

}
