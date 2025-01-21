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
            'file'=>'mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        $file='';
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file->storeAs('uploads',  $file->getClientOriginalName(), 'public');
            // dd($file);

        }
        // dd($file);
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'FileName'=>$file->getClientOriginalName(),
            'user_id' => Auth::id(),
        ]);
      
        
        return redirect()->route('home')->with('success', 'Todo created successfully');
    }

    public function edit($id, Request $request){
        // dd(vars: $request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file'=>'mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $file='';
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileCheck=$file->getClientOriginalName();
            $oldFile=Todo::where('id', $id)->value('FileName');
            // dd($fileCheck);
            if($fileCheck!==$oldFile){
                $file=$file->storeAs('uploads',  $fileCheck  ,'public');
            }
            else{
                $file=$oldFile;
            }

        }

        Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'FileName'=>$file,
        ]);
        return redirect()->route('home')->with('success', 'Todo updated successfully');

    }

    public function delete($id){
        Todo::where('id', $id)->delete();
        return redirect()->route('home')->with('success', 'Todo deleted successfully');
    }
}
