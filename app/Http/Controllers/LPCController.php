<?php

namespace App\Http\Controllers;

use App\Services\LPC\LPCService;
use App\Services\LPC\PhonemeService;
use Illuminate\Http\Request;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        if ($request->has('sentence')) {
            $phonemes = $phonemeService->transform($request->input('sentence'));
            $lpcKeys = $lpcService->getLPCImages($phonemes, $request->input('library_id'));

            return response()->json(['lpcKeys' => $lpcKeys]);
        }
    }
}
