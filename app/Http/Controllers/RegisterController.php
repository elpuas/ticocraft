<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store( Request $request )
    {
        $request->request->add(['username' => Str::slug( $request->username )]);

        // Validate the user
        $validate = $request->validate([
            'name'     => 'required|max:255',
            'username' => 'required|max:255|unique:users|min:3|max:20',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        if( $validate )
        {
            User::create([
                'name'     => $request->name,
                'username' => $request->username,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $attempt = Auth::attempt(['email' => $email, 'password' => $password]);

        if ( $attempt )
        {
            return redirect()->route('post.index');
        }
    }
}
