<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Services\LPC\PhonemeService;
use App\Services\LPC\LPCService;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService, LPCService $lpcService) {
        $phonemes = $phonemeService->transform($request->input('sentence'));
        $result = $lpcService->getLPCImages($phonemes, 1);
        return view('phonemes_form', ['phonemes' => $phonemes]);
    }
}
