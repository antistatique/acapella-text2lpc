<?php

namespace Tests\Feature;

use App\Services\LPC\LPCService;
use Tests\TestCase;

class EncodeLPCTest extends TestCase
{
    public function testSentence1()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;a k;ɔ;ʁ;a;l d;ə m;ɔ̃;n a;m;i ʃ;ɑ̃;t œ̃;n a;ɡ;ʁ;e;a;b;l ʃ;ɑ̃', 1);
        $imagesExpected = [
            [
                'phoneme' => 'la',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'kɔ',
                'image' => 'storage/vos_cases_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'ʁa',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'l',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'də',
                'image' => 'storage/des_jupes_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'mɔ̃',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'n',
                'image' => 'storage/beni_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'am',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'i',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'ʃɑ̃',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'œ̃n',
                'image' => 'storage/beni_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'aɡ',
                'image' => 'storage/gare_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ʁe',
                'image' => 'storage/rance_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ab',
                'image' => 'storage/beni_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'l',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ʃɑ̃',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence2()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l e;t;ɛ;t y;n f;w;a t;ʁ;w;a;z a;m;i', 1);
        $imagesExpected = [
            [
                'phoneme' => 'il',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'et',
                'image' => 'storage/fantome_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ɛt',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'yn',
                'image' => 'storage/beni_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'f',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'wa',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ʁ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'wa',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'z',
                'image' => 'storage/vos_cases_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'am',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'i',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence3()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;ə p;ə;t;i;t a;m;i d;ə m;a s;œ;ʁ ɛ s;ɛ̃;p;a', 1);
        $imagesExpected = [
            [
                'phoneme' => 'lə',
                'image' => 'storage/champignon_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'pə',
                'image' => 'storage/des_jupes_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ti',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'am',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'i',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'də',
                'image' => 'storage/des_jupes_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ma',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'sœ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ʁ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ɛ',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'sɛ̃',
                'image' => 'storage/rance_bain_bleu_default.jpg',
            ],
            [
                'phoneme' => 'pa',
                'image' => 'storage/des_jupes_oh_le_lac_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence4()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l e;t;ɛ;t a p;j;e', 1);
        $imagesExpected = [
            [
                'phoneme' => 'il',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'et',
                'image' => 'storage/fantome_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ɛt',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'a',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'p',
                'image' => 'storage/des_jupes_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'je',
                'image' => 'storage/fille_un_zebu_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence5()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('p;l;y;z i;l ɑ̃ f;ɛ m;w;ɛ̃;z i;l ʁ;e;y;s;i', 1);
        $imagesExpected = [
            [
                'phoneme' => 'p',
                'image' => 'storage/des_jupes_oh_le_lac_default.jpg',

            ],
            [
                'phoneme' => 'ly',
                'image' => 'storage/champignon_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'z',
                'image' => 'storage/vos_cases_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'il',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'ɑ̃',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg'
            ],
            [
                'phoneme' => 'fɛ',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'm',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'wɛ̃',
                'image' => 'storage/champignon_bain_bleu_default.jpg',
            ],
            [
                'phoneme' => 'z',
                'image' => 'storage/vos_cases_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'il',
                'image' => 'storage/champignon_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'ʁe',
                'image' => 'storage/rance_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ys',
                'image' => 'storage/rance_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'i',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg'
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence6()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('s;ɛ;t œ̃;n ɔ;ɡ;ʁ ʒ;i;ɡ;ɑ̃;t;ɛ;s;k', 1);
        $imagesExpected = [
            [
                'phoneme' => 'sɛ',
                'image' => 'storage/rance_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'œ̃n',
                'image' => 'storage/beni_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ɔɡ',
                'image' => 'storage/gare_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'ʁ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ʒi',
                'image' => 'storage/des_jupes_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'ɡɑ̃',
                'image' => 'storage/gare_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'tɛ',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 's',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'k',
                'image' => 'storage/vos_cases_oh_le_lac_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence7()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e n;y;a;ʒ s;ɔ̃;t ɑ̃ f;ɔ;ʁ;m d;ə l;j;ɔ̃', 1);
        $imagesExpected = [
            [
                'phoneme' => 'le',
                'image' => 'storage/champignon_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'ny',
                'image' => 'storage/beni_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'aʒ',
                'image' => 'storage/des_jupes_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'sɔ̃',
                'image' => 'storage/rance_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'ɑ̃',
                'image' => 'storage/fantome_pigeon_blanc_default.jpg',
            ],
            [
                'phoneme' => 'fɔ',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'ʁ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'm',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'də',
                'image' => 'storage/des_jupes_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'l',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'jɔ̃',
                'image' => 'storage/fille_pigeon_blanc_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence8()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e m;u;ɛ;t v;ɔ;l;t o;d;ə;s;y d;ə l;a m;ɛ;ʁ', 1);
        $imagesExpected = [
            [
                'phoneme' => 'le',
                'image' => 'storage/champignon_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'mu',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'ɛt',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'vɔ',
                'image' => 'storage/vos_cases_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'l',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 't',
                'image' => 'storage/fantome_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'od',
                'image' => 'storage/des_jupes_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'əs',
                'image' => 'storage/rance_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'y',
                'image' => 'storage/fantome_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'də',
                'image' => 'storage/des_jupes_un_zebu_default.jpg',
            ],
            [
                'phoneme' => 'la',
                'image' => 'storage/champignon_oh_le_lac_default.jpg',
            ],
            [
                'phoneme' => 'mɛ',
                'image' => 'storage/fantome_ou_est_paul_default.jpg',
            ],
            [
                'phoneme' => 'ʁ',
                'image' => 'storage/rance_oh_le_lac_default.jpg',
            ],
        ];
        $this->assertTrue($images === $imagesExpected);
    }
}
