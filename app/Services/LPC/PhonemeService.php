<?php

namespace App\Services\LPC;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PhonemeService
{
    /**
     * Method to transform a text to phonemes
     * 
     * @return string
     */
    public function transform($userText) {
        $process = new Process(['python3', base_path('phonemizer/transform-phonemes.py'), $userText]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return rtrim($process->getOutput());
    }
}
