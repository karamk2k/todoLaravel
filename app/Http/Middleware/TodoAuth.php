<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\TodoTable as Todo;

class TodoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->id);
        if(Auth::check()){
            $todo = Todo::where('id', $request->id)->first();
            if($todo->user_id !== Auth::id()){
                return redirect()->route('home')->with('error', 'You are not authorized to access this todo');
            }
            else{
                return $next($request);
            }

        }
        else{
            return redirect()->route('home')->with('error', 'You are not authorized to access this todo');
        }
        
    }
}
