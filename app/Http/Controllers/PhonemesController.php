<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PhonemesController extends Controller
{
    public function transformPhonemes(Request $request) {
        $process = new Process(['python3', env('APP_ENV') != 'testing' ? '../transform-phonemes.py' : './transform-phonemes.py', $request->input('sentence')]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        return view('phonemes_form', ['phonemes' => rtrim($process->getOutput())]);
    }
}
