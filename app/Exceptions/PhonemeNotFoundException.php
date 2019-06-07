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

    /**
     * Return a custom JSON response.
     */
    public function render()
    {
        return response()->json([
            'message' => 'La phrase n\'a pas pu être encoder en phonèmes',
        ], 500);
    }
}
