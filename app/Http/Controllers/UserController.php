<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:table_user',
            'password' => 'required|string|min:5|max:12',
            'phone' => 'required|string|min:10|max:13',
            'address' => 'required|string',
            'occupation' => 'required|string'
        ]);

        $data = [
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'occupation' => $request->occupation
        ];

        $user = User::create($data);

        return response()->json([
            'message' => 'Successfully created user!',
            'user' => $user
        ], 201);
    }

    public function registerForm(){
        return view('user.register');
    }
}
