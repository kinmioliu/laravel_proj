<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class UserRegisterController extends Controller
{
    //

    public function create()
    {
        return view('users.register'
        );
    }

    private function encryptPassword($password)
    {
        return bcrypt($password);
    }

    public function store()
    {
        // ddd(request()->all());
        $attribute = request()->validate( [
            'name' => 'required|min:8|max:255',
            'username' => 'required|min:8|max:255|unique:users,username',
            // 'username' => ['required', 'min:8', 'max:255', Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
            ]
        );

        $attribute['password'] = $this->encryptPassword($attribute['password']);

        $user = User::create($attribute);

        auth()->login($user);

        // session()->flash('success', 'register success');

        return redirect('/')->with('success', 'register success');
    }
}
