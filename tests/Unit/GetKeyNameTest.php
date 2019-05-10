<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\LPC\KeyAndPositionService;

class GetKeyNameTest extends TestCase
{
    /**
     * Test if phonemes that should return fantome returns fantome
     *
     * @return void
     */
    public function testFantome()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['m', 't', 'f'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'fantome');
        }
    }

    /**
     * Test if phonemes that should return beni returns beni
     * 
     * @return void
     */
    public function testBeni()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['b', 'n'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'beni');
        }
    }

    /**
     * Test if phonemes that should return gare returns gare
     * 
     * @return void
     */
    public function testGare()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $this->assertTrue($keyAndPositionService->getKeyName('ɡ') === 'gare');
    }

    /**
     * Test if phonemes that should return vos_cases returns vos_cases
     * 
     * @return void
     */
    public function testVosCases()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['v', 'k', 'z'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'vos_cases');
        }
    }

    /**
     * Test if phonemes that should return rance returns rance
     * 
     * @return void
     */
    public function testRance()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['ʁ', 's'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'rance');
        }
    }
    
    /**
     * Test if phonemes that should return champignon returns champignon
     * 
     * @return void
     */
    public function testChampignon()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['w', 'l', 'ʃ', 'ɲ'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'champignon');
        }
    }

    /**
     * Test if phonemes that should return fille returns fille
     * 
     * @return void
     */
    public function testFille()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['ŋ', 'j'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'fille');
        }
    }

    /**
     * Test if phonemes that should return des_jupes returns des_jupes
     * 
     * @return void
     */
    public function testDesJupes()
    {
        $keyAndPositionService = new KeyAndPositionService();
        $phonemes = ['d', 'ʒ', 'p'];

        foreach ($phonemes as $phoneme) {
            $this->assertTrue($keyAndPositionService->getKeyName($phoneme) === 'des_jupes');
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
        $keyAndPositionService = new KeyAndPositionService();
        $this->expectException(\App\Exceptions\PhonemeNotFoundException::class);
        $keyAndPositionService->getKeyName('a');
    }
}
