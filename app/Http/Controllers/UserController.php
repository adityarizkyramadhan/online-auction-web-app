<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
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

            User::create($data);

            return redirect('/user/login');
        } catch (\Throwable $th) {
            // return error message to view register
            return redirect()->back()->with('error', "failed register user because {$th->getMessage()}");
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:5|max:12'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'email not found');
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                return redirect('/home');
            }

            return redirect()->back()->with('error', 'failed login user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed login user because {$th->getMessage()}");
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect('/user/login');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed logout user because {$th->getMessage()}");
        }
    }

    public function profile(Request $request)
    {
        try {
            $user = Auth::user();
            return view('user.profile', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed get profile user because {$th->getMessage()}");
        }
    }

    public function history(Request $request)
    {
        try {
            $user = Auth::user();
            $bid = new Bid();
            $dataArray = $bid->getDataByIdUser($user->id);
            // var_dump($dataArray);
            // die();
            return view('user.history', compact('dataArray'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed get history bid user because {$th->getMessage()}");
        }
    }

    public function registerForm()
    {
        return view('user.register');
    }

    public function loginForm()
    {
        return view('user.login');
    }
}
