<?php

namespace Tests\Unit;

use App\Statics\ConsonantsAndVowels;
use Tests\TestCase;

class ConsonantVowelTest extends TestCase
{
    /**
     * Test check consonant static method.
     */
    public function testConsonants()
    {
        $consonants = [
            'm',
            't',
            'f',
            'b',
            'n',
            'ɡ',
            'v',
            'k',
            'z',
            'ʁ',
            's',
            'w',
            'l',
            'ʃ',
            'ɲ',
            'ŋ',
            'j',
            'd',
            'ʒ',
            'p',
        ];

        foreach ($consonants as $consonant) {
            $this->assertTrue('consonant' === ConsonantsAndVowels::getKey($consonant));
        }
    }

    /**
     * Test check vowel static method.
     */
    public function testVowels()
    {
        $vowels = [
            'a',
            'œ',
            'o',
            'ɛ̃',
            'ø',
            'i',
            'ɔ̃',
            'ɑ̃',
            'u',
            'ɛ',
            'ɔ',
            'y',
            'e',
        ];

        foreach ($vowels as $vowel) {
            $this->assertTrue('vowel' === ConsonantsAndVowels::getKey($vowel));
        }
    }
}
