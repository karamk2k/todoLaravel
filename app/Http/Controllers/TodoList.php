<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoTable as Todo;
use Illuminate\Support\Facades\Auth;

class TodoList extends Controller
{
    
    public function CreatePage(){
        return view('Todo/create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('home')->with('success', 'Todo created successfully');
    }

    public function edit($id, Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('home')->with('success', 'Todo updated successfully');

    }

    public function delete($id){
        Todo::where('id', $id)->delete();
        return redirect()->route('home')->with('success', 'Todo deleted successfully');
    }
}
