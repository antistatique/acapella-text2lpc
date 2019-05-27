<?php

namespace App\Statics;

class PhoneticsFromPhonemes
{
    const PHONETICS = [
        'm' => 'm',
        't' => 't',
        'f' => 'f',
        'b' => 'b',
        'n' => 'n',
        'ɡ' => 'g',
        'v' => 'v',
        'k' => 'k',
        'z' => 'z',
        's' => 's',
        'w' => 'ou',
        'd' => 'd',
        'p' => 'p',
        'a' => 'a',
        'ʁ' => 'r',
        'l' => 'l',
        'ʃ' => 'ch',
        'ɲ' => 'gn',
        'ŋ' => 'ng',
        'j' => 'y',
        'ʒ' => 'j',
        'œ' => 'eu',
        'o' => 'au',
        'ɛ̃' => 'ein',
        'ø' => 'eu',
        'i' => 'i',
        'ɔ̃' => 'on',
        'ɑ̃' => 'an',
        'u' => 'ou',
        'ɛ' => 'è',
        'ɔ' => 'o',
        'y' => 'u',
        'ə' => 'e',
        'e' => 'é',
        'ɑ' => 'â',
        'œ̃' => 'un',
    ];

    public static function getPhonetic($phoneme)
    {
        return self::PHONETICS[$phoneme];
    }
}