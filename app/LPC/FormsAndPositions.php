<?php

namespace App;

class FormsAndPositions
{
    /**
     * Static method to get the key for a phoneme
     * 
     * @return string
     */
    static public function getKeyName($phoneme) {
        switch ($phoneme) {
            case 'm':
                return 'fantôme';
            case 't':
                return 'fantôme';
            case 'f':
                return 'fantôme';
            case 'b':
                return 'béni';
            case 'n':
                return 'béni';
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
            case 'f':
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
                throw new PhonemeNotFoundException();
                break;
        }
    }

    /**
     * Static method to get the position name for a phoneme
     * 
     * @return string
     */
    static public function getPositionName($phoneme) {
        switch ($phoneme) {
            case 'a':
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
                return 'où_est_paul';
            case 'ɛ':
                return 'où_est_paul';
            case 'ɔ':
                return 'où_est_paul';
            case 'y':
                return 'un_zébu';
            case 'e':
                return 'un_zébu';
            default:
                throw new PhonemeNotFoundException();
                break;
        }
    }
}