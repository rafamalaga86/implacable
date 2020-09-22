<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $creation_validation_rules = [
        'name' => 'required|min:3|max:25',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:3|max:25',
    ];

    protected $update_validation_rules = [
        'name' => 'nullable|min:3|max:25',
        'email' => 'nullable|email',
        'password' => 'nullable|confirmed|min:3|max:25',
    ];


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:25',
        ]);

        $is_logged = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true);

        return $is_logged ? back()->with('success', 'You are now logged') : back()->with('error', 'Login details incorrect');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        return view('register');
    }


    public function store(Request $request)
    {
        $request->validate($this->creation_validation_rules);
        User::create($request->all());

        return redirect()->route('home')->with('success', 'User created succesfully');
    }


    public function edit(Request $request)
    {
        return view('user_update', ['user' => Auth::user()]);
    }


    public function update(Request $request, User $user)
    {
        if (!$user->is_admin && auth()->user() !== $user) {
            return back()->with('error', 'You dont have permissions to update this user');
        }

        $request->validate($this->update_validation_rules);
        $user->update(array_filter($request->all()));

        return back()->with('success', 'User updated succesfully');
    }
}
