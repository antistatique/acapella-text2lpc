<?php

namespace App\Http\Controllers;

use App\Services\LPC\LPCService;
use App\Services\LPC\PhonemeService;
use Illuminate\Http\Request;
use PDF;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        if ($request->has('sentence')) {
            $phonemes = $phonemeService->transform($request->input('sentence'));
            $images = $lpcService->getLPCImages($phonemes, 1);

            return response()->json(['images' => $images]);
        }
    }

    public function printTags(Request $request, PhonemeService $phonemeService, LPCService $lpcService)
    {
        if ($request->has('sentence')) {
            $phonemes = $phonemeService->transform($request->input('sentence'));
            $images = $lpcService->getLPCImages($phonemes, 1);

            if ($request->has('library_id')) {
                switch ($request->input('library_id')) {
                    default:
                        $pdf = PDF::loadView('print_formats.default', ['images' => $images]);
                        break;
                }
            } else {
                $pdf = PDF::loadView('print_formats.default', ['images' => $images]);
            }
            return $pdf->stream();
        }
    }
}
