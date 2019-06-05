<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\SaveImagesRequest;
use App\Library;
use App\Key;
use Image;
use File;

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

    /**
     * Method to upload an image to temporary folder
     */
    public function uploadImage(UploadImageRequest $request) {
        $validated = $request->validated();

        $image = Image::make($validated['image']);
        $imagePath = $validated['key'] . '_' . $validated['position'] . '_' . $validated['libraryId'] . '.png';
        $image->save(storage_path('app/temp_images/') . $imagePath);

        return response()->json(['imagePath' => $imagePath]);
    }

    /**
     * Method to move the images that were put in the temporary folder to the final folder.
     * If the library is public, it will go to the public folder
     * If not, it will go to a private folder
     * 
     * The keys will also be created
     */
    public function saveImages(SaveImagesRequest $request) {
        $validated = $request->validated();

        $public = Library::find($validated['libraryId'])->public;

        // Get all the images in the temporary folder that were stored by the user with the API
        foreach ($validated['imagesInfos'] as $imageInfos) {
            if ($public) {
                $imagePath = public_path() . '/' . $imageInfos['imagePath'];
            } else {
                $imagePath = storage_path('app/private/') . $imageInfos['imagePath'];
            }
            File::move(storage_path('app/temp_images/') . $imageInfos['imagePath'], $imagePath);

            Key::create([
                'key' => $imageInfos['key'],
                'position' => $imageInfos['position'],
                'image' => 'private/' . $imageInfos['imagePath'],
                'library_id' => $validated['libraryId'],
            ]);
        }
    }

    /**
     * Method to get a private image
     */
    public function getPrivateImage($fileName) {
        // Explode the filename to get the library_id
        $libraryId = explode('_', $fileName);
        $libraryId = explode('.', $libraryId[sizeof($libraryId) - 1]);
        $libraryId = (int) $libraryId[0];
        // Only return the image if the user logged in is the creator of the library
        if (Library::find($libraryId)->user_id === Auth::user()->id) {
            return Image::make(storage_path('app/private/') . $fileName)->response();
        }
    }
}
