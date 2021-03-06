<?php

namespace App\Statics;

use App\Exceptions\KeyNotFound;
use App\Exceptions\PositionNotFound;

class KeyAndPosition
{
    /**
     * Method to get the key for a phoneme.
     *
     * @return string
     */
    public static function getKeyName($phoneme)
    {
        switch ($phoneme) {
            case 'm':
                return 'fantome';
            case 't':
                return 'fantome';
            case 'f':
                return 'fantome';
            case 'b':
                return 'beni';
            case 'n':
                return 'beni';
            case 'ɡ':
                return 'gare';
            case 'v':
                return 'vos_cases';
            case 'k':
                return 'vos_cases';
            case 'z':
                return 'vos_cases';
            case 'ʁ':
                return 'rance';
            case 's':
                return 'rance';
            case 'w':
                return 'champignon';
            case 'l':
                return 'champignon';
            case 'ʃ':
                return 'champignon';
            case 'ɲ':
                return 'champignon';
            case 'ŋ':
                return 'fille';
            case 'j':
                return 'fille';
            case 'd':
                return 'des_jupes';
            case 'ʒ':
                return 'des_jupes';
            case 'p':
                return 'des_jupes';
            default:
                throw new KeyNotFound();
                break;
        }
    }

    /**
     * Method to get the position name for a phoneme.
     *
     * @return string
     */
    public static function getPositionName($phoneme)
    {
        switch ($phoneme) {
            case 'a':
                return 'oh_le_lac';
            case 'ɑ':
                return 'oh_le_lac';
            case 'œ':
                return 'oh_le_lac';
            case 'o':
                return 'oh_le_lac';
            case 'ɛ̃':
                return 'bain_bleu';
            case 'ø':
                return 'bain_bleu';
            case 'i':
                return 'pigeon_blanc';
            case 'ɔ̃':
                return 'pigeon_blanc';
            case 'ɑ̃':
                return 'pigeon_blanc';
            case 'u':
                return 'ou_est_paul';
            case 'ɛ':
                return 'ou_est_paul';
            case 'ɔ':
                return 'ou_est_paul';
            case 'y':
                return 'un_zebu';
            case 'e':
                return 'un_zebu';
            case 'œ̃':
                return 'un_zebu';
            case 'ə':
                return 'oh_le_lac';
            default:
                throw new PositionNotFound();
                break;
        }
    }
}
