<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Services\LPC\PhonemeService;

class LPCController extends Controller
{
    public function getLPCKeys(Request $request, PhonemeService $phonemeService) {
        $phonemes = $phonemeService->transform($request->input('sentence'));

        return view('phonemes_form', ['phonemes' => $phonemes]);
    }
}
