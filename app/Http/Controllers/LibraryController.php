<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UploadImageRequest;
use App\Library;
use Image;
use Storage;

class LibraryController extends Controller
{
    /**
     * Method to return the view with all the default images
     */
    public function create(Request $request) {
        $defaultLibrary = Library::where('default', true)->first();
        $keysImages = $defaultLibrary->keys;
        return view('add_library', ['keyImages' => $keysImages]);
    }

    /**
     * Method to create a new library
     */
    public function store(StoreLibraryRequest $request) {
        $validated = $request->validated();

        $library = Library::create([
            'name' => $validated['name'],
            'public' => $validated['public'],
            'default' => false,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['library_id' => $library->id]);
    }

    public function saveImage(UploadImageRequest $request) {
        $validated = $request->validated();

        $image = Image::make($validated['image']);
        $image->save(storage_path() . '/app/temp_images/test_original.png');
    }
}
