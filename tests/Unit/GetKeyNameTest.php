<?php

namespace Tests\Unit;

use App\Statics\KeyAndPosition;
use Tests\TestCase;

class GetKeyNameTest extends TestCase
{
    /**
     * Test if phonemes that should return fantome returns fantome.
     */
    public function testFantome()
    {
        $phonemes = ['m', 't', 'f'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('fantome' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return beni returns beni.
     */
    public function testBeni()
    {
        $phonemes = ['b', 'n'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('beni' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return gare returns gare.
     */
    public function testGare()
    {
        $this->assertTrue('gare' === KeyAndPosition::getKeyName('ɡ'));
    }

    /**
     * Test if phonemes that should return vos_cases returns vos_cases.
     */
    public function testVosCases()
    {
        $phonemes = ['v', 'k', 'z'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('vos_cases' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return rance returns rance.
     */
    public function testRance()
    {
        $phonemes = ['ʁ', 's'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('rance' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return champignon returns champignon.
     */
    public function testChampignon()
    {
        $phonemes = ['w', 'l', 'ʃ', 'ɲ'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('champignon' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return fille returns fille.
     */
    public function testFille()
    {
        $phonemes = ['ŋ', 'j'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('fille' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if phonemes that should return des_jupes returns des_jupes.
     */
    public function testDesJupes()
    {
        $phonemes = ['d', 'ʒ', 'p'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue('des_jupes' === KeyAndPosition::getKeyName($phoneme));
        }
    }

    /**
     * Test if returns right exception in case no key was found.
     *
     * @​expectedException App\Exceptions\PhonemeNotFoundException
     */
    public function testNotFound()
    {
        $this->expectException(\App\Exceptions\PhonemeNotFoundException::class);
        KeyAndPosition::getKeyName('a');
    }
}
