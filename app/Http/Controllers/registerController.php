<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function index()
    {
        return view('.auth/register/register', [
            "title" => "Register",
        ]);
    }

    public function store(Request $req){
        $validate =$req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        $req->session()->flash('success','Request berhasil,Silahkan login');

        return redirect('/login');
    }
}
