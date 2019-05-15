<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Statics\KeyAndPosition;

class GetKeyNameTest extends TestCase
{
    /**
     * Test if phonemes that should return fantome returns fantome
     *
     * @return void
     */
    public function testFantome()
    {
        $phonemes = ['m', 't', 'f'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'fantome');
        }
    }

    /**
     * Test if phonemes that should return beni returns beni
     * 
     * @return void
     */
    public function testBeni()
    {
        $phonemes = ['b', 'n'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'beni');
        }
    }

    /**
     * Test if phonemes that should return gare returns gare
     * 
     * @return void
     */
    public function testGare()
    {
        $this->assertTrue(KeyAndPosition::getKeyName('ɡ') === 'gare');
    }

    /**
     * Test if phonemes that should return vos_cases returns vos_cases
     * 
     * @return void
     */
    public function testVosCases()
    {
        $phonemes = ['v', 'k', 'z'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'vos_cases');
        }
    }

    /**
     * Test if phonemes that should return rance returns rance
     * 
     * @return void
     */
    public function testRance()
    {
        $phonemes = ['ʁ', 's'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'rance');
        }
    }
    
    /**
     * Test if phonemes that should return champignon returns champignon
     * 
     * @return void
     */
    public function testChampignon()
    {
        $phonemes = ['w', 'l', 'ʃ', 'ɲ'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'champignon');
        }
    }

    /**
     * Test if phonemes that should return fille returns fille
     * 
     * @return void
     */
    public function testFille()
    {
        $phonemes = ['ŋ', 'j'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'fille');
        }
    }

    /**
     * Test if phonemes that should return des_jupes returns des_jupes
     * 
     * @return void
     */
    public function testDesJupes()
    {
        $phonemes = ['d', 'ʒ', 'p'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue(KeyAndPosition::getKeyName($phoneme) === 'des_jupes');
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
        KeyAndPosition::getKeyName('a');
    }
}
