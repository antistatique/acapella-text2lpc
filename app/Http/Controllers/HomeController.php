<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library;

class HomeController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            $libraries = Library::where('public', true)->orWhere('user_id', Auth::user()->id)->get(['id', 'name']);
        } else {
            $libraries = Library::where('public', true)->get(['id', 'name']);
        }

        return view('home', ['libraries' => $libraries]);
    }
}
