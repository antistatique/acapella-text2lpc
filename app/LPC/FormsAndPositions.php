<?php

namespace App;

class FormsAndPositions
{
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
}