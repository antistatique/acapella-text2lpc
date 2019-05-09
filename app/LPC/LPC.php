<?php

namespace App\LPC;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LPC
{
    static public function transformToPhonemes($userText) {
        $process = new Process(['python3', base_path('phonemizer/transform-phonemes.py'), $userText]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return str_replace('-', '', rtrim($process->getOutput()));
    }
}