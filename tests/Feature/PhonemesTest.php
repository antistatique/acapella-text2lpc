<?php

namespace Tests\Feature;

use Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhonemesTest extends TestCase
{
    /**
     * Test of the first sentence given by the client
     *
     * @return void
     */
    public function testSentence1()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'la chorale de mon ami chante un agréable chant',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'la- kɔʁal də- mɔ̃n ami ʃɑ̃t œ̃n aɡʁeabl ʃɑ̃');
    }

    /**
     * Test of the second sentence given by the client
     *
     * @return void
     */
    public function testSentence2()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'il était une fois trois amis',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'il etɛt yn fwa tʁwaz ami');
    }

    /**
     * Test of the third sentence given by the client
     *
     * @return void
     */
    public function testSentence3()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'le petit ami de ma soeur est sympa',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'lə- pətit ami də- ma- sœʁ ɛ sɛ̃pa');
    }

    /**
     * Test of the fourth sentence given by the client
     *
     * @return void
     */
    public function testSentence4()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'il était à pied',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'il etɛt a pje');
    }

    /**
     * Test of the fifth sentence given by the client
     *
     * @return void
     */
    public function testSentence5()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'plus il en fait moins il réussit',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'plyz il ɑ̃ fɛ mwɛ̃z il ʁeysi');
    }

    /**
     * Test of the sixth sentence given by the client
     *
     * @return void
     */
    public function testSentence6()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'c’est un ogre gigantesque',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'sɛt œ̃n ɔɡʁ ʒiɡɑ̃tɛsk');
    }

    /**
     * Test of the seventh sentence given by the client
     *
     * @return void
     */
    public function testSentence7()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'les nuages sont en forme de lion',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'le- nyaʒ sɔ̃t ɑ̃ fɔʁm də- ljɔ̃');
    }

    /**
     * Test of the eighth sentence given by the client
     *
     * @return void
     */
    public function testSentence8()
    {
        Session::start();

        $response = $this->post('/test-phonemes', [
            'sentence' => 'les mouettes volent au-dessus de la mer',
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200, $response->getStatusCode());
        $response->assertViewHas('phonemes', 'le- muɛt vɔlt odəsy də- la- mɛʁ');
    }
}
