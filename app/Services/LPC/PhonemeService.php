<?php

namespace App\Services\LPC;

use App\Exceptions\PhonemeNotFoundException;
use Symfony\Component\Process\Process;

class PhonemeService
{
    /**
     * Method to transform a text to phonemes.
     *
     * @return string
     */
    public function transform($userText)
    {
        $process = new Process([env('PYTHON_BIN', 'python'), base_path('phonemizer/transform-phonemes.py'), $userText]);
        $process->run();

        if (! $process->isSuccessful()) {
            throw new PhonemeNotFoundException();
        }

        return rtrim($process->getOutput());
    }

    /**
     * Method to format phonemes returned by the user
     * so we can use them in the LPCService
     * 
     * @return string
     */
    public function format($userText)
    {
        $process = new Process([env('PYTHON_BIN', 'python'), base_path('phonemizer/get-formatted-phonemes.py'), $userText]);
        $process->run();

        if (! $process->isSuccessful()) {
            throw new PhonemeNotFoundException();
        }

        return rtrim($process->getOutput());
    }
}
