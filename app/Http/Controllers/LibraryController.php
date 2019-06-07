<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveImagesRequest;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UploadImageRequest;
use App\Key;
use App\Library;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Intervention\Image\ImageManagerStatic;

class LibraryController extends Controller
{
    /**
     * Method to return the view with all the default images.
     */
    public function create(Request $request)
    {
        $defaultLibrary = Library::where('default', true)->first();
        $keysImages = $defaultLibrary->keys;

        return view('add_library', ['keyImages' => $keysImages]);
    }

    /**
     * Method to create a new library.
     */
    public function store(StoreLibraryRequest $request)
    {
        $validated = $request->validated();

        $library = Library::create([
            'name'    => $validated['name'],
            'public'  => $validated['public'],
            'default' => false,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['library_id' => $library->id]);
    }

    /**
     * Method to upload an image to temporary folder.
     */
    public function uploadImage(UploadImageRequest $request)
    {
        $validated = $request->validated();

        $image = Image::make($validated['image']);
        $imagePath = $validated['key'].'_'.$validated['position'].'_'.$validated['libraryId'].'_'.str_random(10).'.png';
        $image->save(storage_path('app/temp_images/').$imagePath);

        return response()->json(['imagePath' => $imagePath]);
    }

    /**
     * Method to move the images that were put in the temporary folder to the final folder.
     * If the library is public, it will go to the public folder
     * If not, it will go to a private folder.
     *
     * The keys will also be created
     */
    public function saveImages(SaveImagesRequest $request)
    {
        $validated = $request->validated();

        $public = Library::find($validated['libraryId'])->public;

        foreach ($validated['imagesInfos'] as $testImage) {
            $imagePathValidated = basename($testImage['imagePath']);
            try {
                ImageManagerStatic::make(storage_path('app/temp_images/').$imagePathValidated);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Une erreur est survenue durant la sauvegarde des images']);
            }
        }

        // Get all the images in the temporary folder that were stored by the user with the API
        foreach ($validated['imagesInfos'] as $imageInfos) {
            $imagePathValidated = basename($imageInfos['imagePath']);

            if ($public) {
                $imagePath = storage_path('app/public/').$imagePathValidated;
            } else {
                $imagePath = storage_path('app/private/').$imagePathValidated;
            }

            File::move(storage_path('app/temp_images/').$imagePathValidated, $imagePath);

            $key = Key::create([
                'key'        => $imageInfos['key'],
                'position'   => $imageInfos['position'],
                'library_id' => $validated['libraryId'],
                'image'      => $imagePathValidated,
            ]);

            if ($public) {
                $key->image = '/storage/'.$imagePathValidated;
            } else {
                $key->image = '/private/files/'.(string) $key->id.'/'.$imagePathValidated;
            }

            $key->save();
        }
    }

    /**
     * Method to get a private image.
     */
    public function getPrivateImage($keyId, $fileName)
    {
        // Get the user id of the library from the key
        $libraryUserId = Key::find($keyId)->library->user_id;

        // Only return the image if the user logged in is the creator of the library
        if ($libraryUserId !== Auth::user()->id) {
            return '';
        }

        return Image::make(storage_path('app/private/').$fileName)->response();
    }
}
