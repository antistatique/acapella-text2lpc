<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $libraries = Library::where('completed', true)->where('public', true)->orWhere('user_id', Auth::user()->id)->get(['id', 'name', 'public']);
        } else {
            $libraries = Library::where('completed', true)->where('public', true)->get(['id', 'name', 'public']);
        }

        return view('home', ['libraries' => $libraries]);
    }
}
