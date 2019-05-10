<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ConsonantsAndVowels;

class ConsonantVowelTest extends TestCase
{
    /**
     * Test check consonant static method
     *
     * @return void
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
            $this->assertTrue(ConsonantsAndVowels::getKey($consonant) === 'consonant');
        }
    }

    /**
     * Test check vowel static method
     */
    public function testVowels() {
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
            $this->assertTrue(ConsonantsAndVowels::getKey($vowel) === 'vowel');
        }
    }
}
