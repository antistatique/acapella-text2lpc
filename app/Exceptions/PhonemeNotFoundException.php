<?php

namespace App\Exceptions;

use Exception;

class PhonemeNotFoundException extends Exception
{
    /**
     * Log the exception
     *
     * @return void
     */
    public function report() {
        \Log::debug('Phoneme not found');
    }
}
