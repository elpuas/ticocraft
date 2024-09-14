<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store( Request $request )
    {
        // dd($request->get('name'));

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
                'username' => Str::slug( $request->username ),
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
    }
}
