<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;


class User extends Controller
{
    public function register(){

        return view('User/register');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        ModelsUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('loginpage');
    }

    public function loginPage(){   

        return view('User/login');
    }

    public function login(Request $request){
    //   dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = ModelsUser::where('email', $request->email)->first();
       
        if(!$user){
            return redirect()->route('loginpage')->with('error', 'User not found');
        }
        if(!password_verify($request->password, $user->password)){
            return redirect()->route('loginpage')->with('error', 'Incorrect password');
        }
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Login successful');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginpage');
    }
}
