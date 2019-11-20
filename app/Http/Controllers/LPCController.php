<?php

namespace App\Http\Controllers;

use App\Library;
use App\Services\LPC\LPCService;
use App\Services\LPC\PhonemeService;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        $library = Library::find($request->input('library_id'));
        if ($request->has('sentence') && '' != $request->input('sentence')) {
            $phonemes = $phonemeService->transform($request->input('sentence'));
        } else if ($request->has('phonemes') && '' != $request->input('phonemes')) {
            $phonemes = $phonemeService->format($request->input('phonemes'));
        } else {
            return response()->json(['message' => 'Veuillez saisir une phrase']);
        }
        if ($library->public || (Auth::check() && $library->user_id === Auth::user()->id && $library->completed)) {
            $lpcKeys = $lpcService->getLPCImages($phonemes, $request->input('library_id'));

            return response()->json(['lpcKeys' => $lpcKeys]);
        }

        return response()->json(['message' => 'Vous n\'êtes pas autorisé à utiliser cette librairie'], 403);
    }

    public function printTags(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        if (!$request->has('library_id')) {
            return redirect('/');
        }

        if ($request->has('sentence') && '' != $request->input('sentence')) {
            $phonemes = $phonemeService->transform($request->input('sentence'));
        } else if ($request->has('phonemes') && '' != $request->input('phonemes')) {
            $phonemes = $phonemeService->format($request->input('phonemes'));
        } else {
            return redirect('/');
        }

        $library = Library::find($request->input('library_id'));
        if ($library->public || (Auth::check() && $library->user_id === Auth::user()->id && $library->completed)) {
            $imagesTemp = $lpcService->getLPCImages($phonemes, $request->input('library_id'));
            $images = [];

            if ($library->public) {
                foreach ($imagesTemp as $image) {
                    array_push($images, storage_path('app/public/').basename($image['image']));
                }
            } else {
                foreach ($imagesTemp as $image) {
                    array_push($images, storage_path('app/private/').basename($image['image']));
                }
            }

            if ($request->has('format')) {
                switch ($request->input('format')) {
                    default:
                        $pdf = PDF::loadView('print_formats.default', ['images' => $images]);
                        break;
                }
            } else {
                $pdf = PDF::loadView('print_formats.default', ['images' => $images]);
            }
            return $pdf->stream();
        }

        return redirect('/');
    }
}
