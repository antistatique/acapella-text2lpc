<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\LPC\PhonemeService;

class TransformTest extends TestCase
{
    /**
     * Test of the first sentence given by the client
     *
     * @return void
     */
    public function testSentence1()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('la chorale de mon ami chante un agréable chant');
        $this->assertTrue($result === 'la kɔʁal də mɔ̃n ami ʃɑ̃t œ̃n aɡʁeabl ʃɑ̃');
    }

    /**
     * Test of the second sentence given by the client
     *
     * @return void
     */
    public function testSentence2()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('il était une fois trois amis');
        $this->assertTrue($result === 'il etɛt yn fwa tʁwaz ami');
    }

    /**
     * Test of the third sentence given by the client
     *
     * @return void
     */
    public function testSentence3()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('le petit ami de ma soeur est sympa');
        $this->assertTrue($result === 'lə pətit ami də ma sœʁ ɛ sɛ̃pa');
    }

    /**
     * Test of the fourth sentence given by the client
     *
     * @return void
     */
    public function testSentence4()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('il était à pied');
        $this->assertTrue($result === 'il etɛt a pje');
    }

    /**
     * Test of the fifth sentence given by the client
     *
     * @return void
     */
    public function testSentence5()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('plus il en fait moins il réussit');
        $this->assertTrue($result === 'plyz il ɑ̃ fɛ mwɛ̃z il ʁeysi');
    }

    /**
     * Test of the sixth sentence given by the client
     *
     * @return void
     */
    public function testSentence6()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('c’est un ogre gigantesque');
        $this->assertTrue($result === 'sɛt œ̃n ɔɡʁ ʒiɡɑ̃tɛsk');
    }

    /**
     * Test of the seventh sentence given by the client
     *
     * @return void
     */
    public function testSentence7()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('les nuages sont en forme de lion');
        $this->assertTrue($result === 'le nyaʒ sɔ̃t ɑ̃ fɔʁm də ljɔ̃');
    }

    /**
     * Test of the eighth sentence given by the client
     *
     * @return void
     */
    public function testSentence8()
    {
        $phonemeService = new PhonemeService();

        $result = $phonemeService->transform('les mouettes volent au-dessus de la mer');
        $this->assertTrue($result === 'le muɛt vɔlt odəsy də la mɛʁ');
    }
}
