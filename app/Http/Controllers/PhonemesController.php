<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PhonemesController extends Controller
{
    public function transformPhonemes(Request $request) {
        $process = new Process(['python3', '../transform-phonemes.py', 'hello']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        dd($process->getOutput());
    }
}
