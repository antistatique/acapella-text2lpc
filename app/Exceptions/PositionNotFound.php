<?php

namespace App\Exceptions;

use Exception;

class PositionNotFound extends Exception
{
    /**
     * Log the exception.
     */
    public function report()
    {
        \Log::debug('Position not found');
    }

    /**
     * Return a custom JSON response.
     */
    public function render()
    {
        return response()->json([
            'message' => 'La position n\'a pas pu être identifié pour un des phonèmes de la phrase',
        ], 500);
    }
}
