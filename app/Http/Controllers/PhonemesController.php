<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\LPC\LPC;

class PhonemesController extends Controller
{
    public function transformPhonemes(Request $request) {
        $phonemes = LPC::transformToPhonemes($request->input('sentence'));

        return view('phonemes_form', ['phonemes' => $phonemes]);
    }
}
