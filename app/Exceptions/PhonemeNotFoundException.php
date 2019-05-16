<?php

namespace App\Exceptions;

use Exception;

class PhonemeNotFoundException extends Exception
{
    /**
     * Log the exception.
     */
    public function report()
    {
        \Log::debug('Phoneme not found');
    }
}
