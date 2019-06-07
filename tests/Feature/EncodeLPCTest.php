<?php

namespace Tests\Feature;

use App\Services\LPC\LPCService;
use Tests\TestCase;

class EncodeLPCTest extends TestCase
{
    public function testSentence1()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;a;k;ɔ;ʁ;a;l;d;ə;m;ɔ̃;n;a;m;i;ʃ;ɑ̃;t;œ̃;n;a;ɡ;ʁ;e;a;b;l;ʃ;ɑ̃', 1);
        $imagesExpected = [
            [
                "phoneme" => "la",
                "phonetic" => "la",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "kɔ",
                "phonetic" => "ko",
                "image" => "/storage/vos_cases_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ʁa",
                "phonetic" => "ra",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "l",
                "phonetic" => "l",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "də",
                "phonetic" => "de",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "mɔ̃",
                "phonetic" => "mon",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "na",
                "phonetic" => "na",
                "image" => "/storage/beni_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "mi",
                "phonetic" => "mi",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "ʃɑ̃",
                "phonetic" => "chan",
                "image" => "/storage/champignon_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "tœ̃",
                "phonetic" => "tun",
                "image" => "/storage/fantome_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "na",
                "phonetic" => "na",
                "image" => "/storage/beni_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ɡ",
                "phonetic" => "g",
                "image" => "/storage/gare_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʁe",
                "phonetic" => "ré",
                "image" => "/storage/rance_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "a",
                "phonetic" => "a",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "b",
                "phonetic" => "b",
                "image" => "/storage/beni_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "l",
                "phonetic" => "l",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʃɑ̃",
                "phonetic" => "chan",
                "image" => "/storage/champignon_pigeon_blanc_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence2()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l;e;t;ɛ;t;y;n;f;w;a;t;ʁ;w;a;z;a;m;i', 1);
        $imagesExpected = [
            [
                "phoneme" => "i",
                "phonetic" => "i",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "le",
                "phonetic" => "lé",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "tɛ",
                "phonetic" => "tè",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ty",
                "phonetic" => "tu",
                "image" => "/storage/fantome_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "n",
                "phonetic" => "n",
                "image" => "/storage/beni_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "f",
                "phonetic" => "f",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "wa",
                "phonetic" => "oua",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "t",
                "phonetic" => "t",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʁ",
                "phonetic" => "r",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "wa",
                "phonetic" => "oua",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "za",
                "phonetic" => "za",
                "image" => "/storage/vos_cases_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "mi",
                "phonetic" => "mi",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence3()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;ə;p;ə;t;i;t;a;m;i;d;ə;m;a;s;œ;ʁ;ɛ;s;ɛ̃;p;a', 1);
        $imagesExpected = [
            [
                "phoneme" => "lə",
                "phonetic" => "le",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "pə",
                "phonetic" => "pe",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "ti",
                "phonetic" => "ti",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "ta",
                "phonetic" => "ta",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "mi",
                "phonetic" => "mi",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "də",
                "phonetic" => "de",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "ma",
                "phonetic" => "ma",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "sœ",
                "phonetic" => "seu",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʁɛ",
                "phonetic" => "rè",
                "image" => "/storage/rance_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "sɛ̃",
                "phonetic" => "sein",
                "image" => "/storage/rance_bain_bleu_default@2x.png"
            ],
            [
                "phoneme" => "pa",
                "phonetic" => "pa",
                "image" => "/storage/des_jupes_oh_le_lac_default@2x.png"
            ]            
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence4()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('i;l;e;t;ɛ;t;a;p;j;e', 1);
        $imagesExpected = [
            [
                "phoneme" => "i",
                "phonetic" => "i",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "le",
                "phonetic" => "lé",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "tɛ",
                "phonetic" => "tè",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ta",
                "phonetic" => "ta",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "p",
                "phonetic" => "p",
                "image" => "/storage/des_jupes_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "je",
                "phonetic" => "yé",
                "image" => "/storage/fille_un_zebu_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence5()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('p;l;y;z;i;l;ɑ̃;f;ɛ;m;w;ɛ̃;z;i;l;ʁ;e;y;s;i', 1);
        $imagesExpected = [
            [
                "phoneme" => "p",
                "phonetic" => "p",
                "image" => "/storage/des_jupes_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ly",
                "phonetic" => "lu",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "zi",
                "phonetic" => "zi",
                "image" => "/storage/vos_cases_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "lɑ̃",
                "phonetic" => "lan",
                "image" => "/storage/champignon_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "fɛ",
                "phonetic" => "fè",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "m",
                "phonetic" => "m",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "wɛ̃",
                "phonetic" => "ouein",
                "image" => "/storage/champignon_bain_bleu_default@2x.png"
            ],
            [
                "phoneme" => "zi",
                "phonetic" => "zi",
                "image" => "/storage/vos_cases_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "l",
                "phonetic" => "l",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʁe",
                "phonetic" => "ré",
                "image" => "/storage/rance_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "y",
                "phonetic" => "u",
                "image" => "/storage/fantome_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "si",
                "phonetic" => "si",
                "image" => "/storage/rance_pigeon_blanc_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence6()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('s;ɛ;t;œ̃;n;ɔ;ɡ;ʁ;ʒ;i;ɡ;ɑ̃;t;ɛ;s;k', 1);
        $imagesExpected = [
            [
                "phoneme" => "sɛ",
                "phonetic" => "sè",
                "image" => "/storage/rance_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "tœ̃",
                "phonetic" => "tun",
                "image" => "/storage/fantome_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "nɔ",
                "phonetic" => "no",
                "image" => "/storage/beni_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ɡ",
                "phonetic" => "g",
                "image" => "/storage/gare_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʁ",
                "phonetic" => "r",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʒi",
                "phonetic" => "ji",
                "image" => "/storage/des_jupes_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "ɡɑ̃",
                "phonetic" => "gan",
                "image" => "/storage/gare_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "tɛ",
                "phonetic" => "tè",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "s",
                "phonetic" => "s",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "k",
                "phonetic" => "k",
                "image" => "/storage/vos_cases_oh_le_lac_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence7()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e;n;y;a;ʒ;s;ɔ̃;t;ɑ̃;f;ɔ;ʁ;m;d;ə;l;j;ɔ̃', 1);
        $imagesExpected = [
            [
                "phoneme" => "le",
                "phonetic" => "lé",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "ny",
                "phonetic" => "nu",
                "image" => "/storage/beni_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "a",
                "phonetic" => "a",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "ʒ",
                "phonetic" => "j",
                "image" => "/storage/des_jupes_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "sɔ̃",
                "phonetic" => "son",
                "image" => "/storage/rance_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "tɑ̃",
                "phonetic" => "tan",
                "image" => "/storage/fantome_pigeon_blanc_default@2x.png"
            ],
            [
                "phoneme" => "fɔ",
                "phonetic" => "fo",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ʁ",
                "phonetic" => "r",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "m",
                "phonetic" => "m",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "də",
                "phonetic" => "de",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "l",
                "phonetic" => "l",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "jɔ̃",
                "phonetic" => "yon",
                "image" => "/storage/fille_pigeon_blanc_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }

    public function testSentence8()
    {
        $lpcService = new LPCService();

        $images = $lpcService->getLPCImages('l;e;m;u;ɛ;t;v;ɔ;l;t;o;d;ə;s;y;d;ə;l;a;m;ɛ;ʁ', 1);
        $imagesExpected = [
            [
                "phoneme" => "le",
                "phonetic" => "lé",
                "image" => "/storage/champignon_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "mu",
                "phonetic" => "mou",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ɛ",
                "phonetic" => "è",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "t",
                "phonetic" => "t",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "vɔ",
                "phonetic" => "vo",
                "image" => "/storage/vos_cases_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "l",
                "phonetic" => "l",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "to",
                "phonetic" => "tau",
                "image" => "/storage/fantome_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "də",
                "phonetic" => "de",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "sy",
                "phonetic" => "su",
                "image" => "/storage/rance_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "də",
                "phonetic" => "de",
                "image" => "/storage/des_jupes_un_zebu_default@2x.png"
            ],
            [
                "phoneme" => "la",
                "phonetic" => "la",
                "image" => "/storage/champignon_oh_le_lac_default@2x.png"
            ],
            [
                "phoneme" => "mɛ",
                "phonetic" => "mè",
                "image" => "/storage/fantome_ou_est_paul_default@2x.png"
            ],
            [
                "phoneme" => "ʁ",
                "phonetic" => "r",
                "image" => "/storage/rance_oh_le_lac_default@2x.png"
            ]
        ];
        $this->assertTrue($images === $imagesExpected);
    }
}
