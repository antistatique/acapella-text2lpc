<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    public function create(Request $request) {
        $defaultLibrary = Library::where('default', true)->first();
        $keysImages = $defaultLibrary->keys;
        return view('add_library', ['keyImages' => $keysImages]);
    }
}
