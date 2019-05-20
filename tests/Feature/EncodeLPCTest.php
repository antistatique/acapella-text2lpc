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
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/vos_cases_ou_est_paul_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/des_jupes_un_zebu_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/beni_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/champignon_pigeon_blanc_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/beni_un_zebu_default.jpg',
            'storage/gare_oh_le_lac_default.jpg',
            'storage/rance_un_zebu_default.jpg',
            'storage/beni_oh_le_lac_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/champignon_pigeon_blanc_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence2()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l e;t;ɛ;t y;n f;w;a t;ʁ;w;a;z a;m;i', 1);
        $imagesExpected = [
            'storage/champignon_pigeon_blanc_default.jpg',
            'storage/fantome_un_zebu_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/beni_un_zebu_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/vos_cases_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence3()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;ə p;ə;t;i;t a;m;i d;ə m;a s;œ;ʁ ɛ s;ɛ̃;p;a', 1);
        $imagesExpected = [
            'storage/champignon_un_zebu_default.jpg',
            'storage/des_jupes_un_zebu_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/des_jupes_un_zebu_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/rance_bain_bleu_default.jpg',
            'storage/des_jupes_oh_le_lac_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence4()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l e;t;ɛ;t a p;j;e', 1);
        $imagesExpected = [
            'storage/champignon_pigeon_blanc_default.jpg',
            'storage/fantome_un_zebu_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/des_jupes_oh_le_lac_default.jpg',
            'storage/fille_un_zebu_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence5()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('p;l;y;z i;l ɑ̃ f;ɛ m;w;ɛ̃;z i;l ʁ;e;y;s;i', 1);
        $imagesExpected = [
            'storage/des_jupes_oh_le_lac_default.jpg',
            'storage/champignon_un_zebu_default.jpg',
            'storage/vos_cases_oh_le_lac_default.jpg',
            'storage/champignon_pigeon_blanc_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/champignon_bain_bleu_default.jpg',
            'storage/vos_cases_oh_le_lac_default.jpg',
            'storage/champignon_pigeon_blanc_default.jpg',
            'storage/rance_un_zebu_default.jpg',
            'storage/rance_un_zebu_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence6()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('s;ɛ;t œ̃;n ɔ;ɡ;ʁ ʒ;i;ɡ;ɑ̃;t;ɛ;s;k', 1);
        $imagesExpected = [
            'storage/rance_ou_est_paul_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/beni_un_zebu_default.jpg',
            'storage/gare_ou_est_paul_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/des_jupes_pigeon_blanc_default.jpg',
            'storage/gare_pigeon_blanc_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/vos_cases_oh_le_lac_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence7()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e n;y;a;ʒ s;ɔ̃;t ɑ̃ f;ɔ;ʁ;m d;ə l;j;ɔ̃', 1);
        $imagesExpected = [
            'storage/champignon_un_zebu_default.jpg',
            'storage/beni_un_zebu_default.jpg',
            'storage/des_jupes_oh_le_lac_default.jpg',
            'storage/rance_pigeon_blanc_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/fantome_pigeon_blanc_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/des_jupes_un_zebu_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/fille_pigeon_blanc_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence8()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e m;u;ɛ;t v;ɔ;l;t o;d;ə;s;y d;ə l;a m;ɛ;ʁ', 1);
        $imagesExpected = [
            'storage/champignon_un_zebu_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/vos_cases_ou_est_paul_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/fantome_oh_le_lac_default.jpg',
            'storage/des_jupes_oh_le_lac_default.jpg',
            'storage/rance_un_zebu_default.jpg',
            'storage/fantome_un_zebu_default.jpg',
            'storage/des_jupes_un_zebu_default.jpg',
            'storage/champignon_oh_le_lac_default.jpg',
            'storage/fantome_ou_est_paul_default.jpg',
            'storage/rance_oh_le_lac_default.jpg',
        ];
        $this->assertTrue($images === $imagesExpected);
    }
}
