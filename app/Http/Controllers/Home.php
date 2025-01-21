<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoTable as Todo;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index(){
        $todos = Todo::where('user_id', Auth::id())->get();
        // dd($todos);
        return view('welcome', compact('todos'));
    }
}
