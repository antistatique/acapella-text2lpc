<?php

namespace App\Http\Controllers;

use App\Library;
use App\Services\LPC\LPCService;
use App\Services\LPC\PhonemeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        $library = Library::find($request->input('library_id'));
        if ($library->public || (Auth::check() && $library->user_id === Auth::user()->id)) {
            if ($request->has('sentence') && '' != $request->input('sentence')) {
                $phonemes = $phonemeService->transform($request->input('sentence'));
                $lpcKeys = $lpcService->getLPCImages($phonemes, $request->input('library_id'));

                return response()->json(['lpcKeys' => $lpcKeys]);
            }

            return response()->json(['message' => 'Veuillez saisir une phrase']);
        }

        return response()->json(['message' => 'Vous n\'êtes pas autorisé à utiliser cette librairie'], 403);
    }
}
