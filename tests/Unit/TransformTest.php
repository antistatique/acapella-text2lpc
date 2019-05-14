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
        $this->assertTrue($result === 'l;a k;ɔ;ʁ;a;l d;ə m;ɔ̃;n a;m;i ʃ;ɑ̃;t œ̃;n a;ɡ;ʁ;e;a;b;l ʃ;ɑ̃');
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
        $this->assertTrue($result === 'i;l e;t;ɛ;t y;n f;w;a t;ʁ;w;a;z a;m;i');
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
        $this->assertTrue($result === 'l;ə p;ə;t;i;t a;m;i d;ə m;a s;œ;ʁ ɛ s;ɛ̃;p;a');
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
        $this->assertTrue($result === 'i;l e;t;ɛ;t a p;j;e');
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
        $this->assertTrue($result === 'p;l;y;z i;l ɑ̃ f;ɛ m;w;ɛ̃;z i;l ʁ;e;y;s;i');
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
        $this->assertTrue($result === 's;ɛ;t œ̃;n ɔ;ɡ;ʁ ʒ;i;ɡ;ɑ̃;t;ɛ;s;k');
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
        $this->assertTrue($result === 'l;e n;y;a;ʒ s;ɔ̃;t ɑ̃ f;ɔ;ʁ;m d;ə l;j;ɔ̃');
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
        $this->assertTrue($result === 'l;e m;u;ɛ;t v;ɔ;l;t o;d;ə;s;y d;ə l;a m;ɛ;ʁ');
    }
}
