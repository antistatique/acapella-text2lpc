<?php

namespace Tests\Unit;

use App\Statics\KeyAndPosition;
use Tests\TestCase;

class GetPositionNameTest extends TestCase
{
    /**
     * Test if phonemes that should return oh_le_lac returns oh_le_lac.
     */
    public function testOhLeLac()
    {
        $phonemes = ['a', 'œ', 'o'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('oh_le_lac' === KeyAndPosition::getPositionName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return bain_bleu returns bain_bleu.
     */
    public function testBainBleu()
    {
        $phonemes = ['ɛ̃', 'ø'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('bain_bleu' === KeyAndPosition::getPositionName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return pigeon_blanc returns pigeon_blanc.
     */
    public function testPigeonBlanc()
    {
        $phonemes = ['i', 'ɔ̃', 'ɑ̃'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('pigeon_blanc' === KeyAndPosition::getPositionName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return ou_est_paul returns ou_est_paul.
     */
    public function testOuEstPaul()
    {
        $phonemes = ['u', 'ɛ', 'ɔ'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('ou_est_paul' === KeyAndPosition::getPositionName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return un_zebu returns un_zebu.
     */
    public function testUnZebu()
    {
        $phonemes = ['y', 'e'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('un_zebu' === KeyAndPosition::getPositionName($phoneme));
        }
    }

    /**
     * Test if returns right exception in case no key was found.
     *
     * @​expectedException App\Exceptions\PhonemeNotFoundException
     */
    public function testNotFound()
    {
        $this->expectException(\App\Exceptions\PositionNotFound::class);
        KeyAndPosition::getPositionName('m');
    }
}
