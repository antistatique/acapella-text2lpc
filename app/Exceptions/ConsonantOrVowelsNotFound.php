<?php

namespace App\Exceptions;

use Exception;

class ConsonantOrVowelsNotFound extends Exception
{
    /**
     * Log the exception.
     */
    public function report()
    {
        \Log::debug('Couldn\'t check if phoneme was consonant or vowel');
    }

    /**
     * Return a custom JSON response.
     */
    public function render()
    {
        return response()->json([
            'message' => 'Il y a eu un problème durant l\'identification du phonème',
        ], 500);
    }
}
