<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255', 
            'username' => 'required', 
            'email' => 'required|email:dns'
        ]);
        $data['password'] = bcrypt($request['password']);

        User::create($data);

        return redirect()->route('login')->with('success', 'Login successfull!');
    }
}
