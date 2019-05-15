<?php

namespace App\Statics;

class ConsonantsAndVowels
{
    
    /**
     * Associative array with all phonemes and if they're consonants or vowels
     */
    const CONSONANTSANDVOWELS = [
        'm' => 'consonant', 'a' => 'vowel',
        't' => 'consonant', 'œ' => 'vowel',
        'f' => 'consonant', 'o' => 'vowel',
        'b' => 'consonant', 'ɛ̃' => 'vowel',
        'n' => 'consonant', 'ø' => 'vowel',
        'ɡ' => 'consonant', 'i' => 'vowel',
        'v' => 'consonant', 'ɔ̃' => 'vowel',
        'k' => 'consonant', 'ɑ̃' => 'vowel',
        'z' => 'consonant', 'u' => 'vowel',
        'ʁ' => 'consonant', 'ɛ' => 'vowel',
        's' => 'consonant', 'ɔ' => 'vowel',
        'w' => 'consonant', 'y' => 'vowel',
        'l' => 'consonant', 'ə' => 'vowel',
        'ʃ' => 'consonant', 'e' => 'vowel',
        'ɲ' => 'consonant', 'ɑ' => 'vowel',
        'ŋ' => 'consonant', 'œ̃' => 'vowel',
        'j' => 'consonant',
        'd' => 'consonant',
        'ʒ' => 'consonant',
        'p' => 'consonant'
    ];

    /**
     * Static method to get the key from the constant
     * Will return if the phoneme is a consonant or a vowel
     * 
     * @return string
     */
    static public function getKey($phoneme) {
        return self::CONSONANTSANDVOWELS[$phoneme];
    }
}