<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Statics\KeyAndPosition;

class GetPositionNameTest extends TestCase
{
    /**
     * Test if phonemes that should return oh_le_lac returns oh_le_lac
     *
     * @return void
     */
    public function testOhLeLac()
    {
        $phonemes = ['a', 'œ', 'o'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getPositionName($phoneme) === 'oh_le_lac');
        }
    }

    /**
     * Test if phonemes that should return bain_bleu returns bain_bleu
     *
     * @return void
     */
    public function testBainBleu()
    {
        $phonemes = ['ɛ̃', 'ø'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getPositionName($phoneme) === 'bain_bleu');
        }
    }

    /**
     * Test if phonemes that should return pigeon_blanc returns pigeon_blanc
     *
     * @return void
     */
    public function testPigeonBlanc()
    {
        $phonemes = ['i', 'ɔ̃', 'ɑ̃'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getPositionName($phoneme) === 'pigeon_blanc');
        }
    }

    /**
     * Test if phonemes that should return ou_est_paul returns ou_est_paul
     *
     * @return void
     */
    public function testOuEstPaul()
    {
        $phonemes = ['u', 'ɛ', 'ɔ'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getPositionName($phoneme) === 'ou_est_paul');
        }
    }

    /**
     * Test if phonemes that should return un_zebu returns un_zebu
     *
     * @return void
     */
    public function testUnZebu()
    {
        $phonemes = ['y', 'e'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getPositionName($phoneme) === 'un_zebu');
        }
    }

    /**
     * Test if returns right exception in case no key was found
     * 
     * @return void
     * @​expectedException App\Exceptions\PhonemeNotFoundException
     */
    public function testNotFound()
    {
        $this->expectException(\App\Exceptions\PhonemeNotFoundException::class);
        KeyAndPosition::getPositionName('m');
    }
}
