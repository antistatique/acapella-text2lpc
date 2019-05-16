<?php

namespace App\Services\LPC;

use App\Statics\ConsonantsAndVowels;
use App\Statics\KeyAndPosition;

class LPCService
{
    /**
     * Method to get the Images for the phonemes sent as a parameter.
     *
     * @param array $phonemes   : Phonemes from phonemizer
     * @param int   $library_id : Id of the library that the user chose
     *
     * @return array
     */
    public function getLPCImages($phonemes, $library_id)
    {
        // Create array that will hold the images
        $images = [];
        // Get all the words in the sentence sent by the user
        $words = explode(' ', $phonemes);
        // Loop through all the words
        foreach ($words as $word) {
            // Get the groups with the split method
            $groups = $this->split($word);
            $index = 0;
            // Loop over all the the groups in the current word
            while ($index < sizeof($groups)) {
                // Explode the group to get the 2 phonemes
                $groupsExploded = explode(';', $groups[$index]);
                // If there's only 1 phoneme, we can search for the LPC key
                if (1 === sizeof($groupsExploded)) {
                    /*
                        Check if the phoneme is a consonant or a vowel and get the key and position accordingly
                        Since there's only 1 phoneme, we can get the key or position because which ones represent a blank
                    */
                    list($key, $position) = $this->getKeyAndPositionSinglePhoneme($groupsExploded);
                } else {
                    // Check the pattern of the group. Get the key and position if it's a consonant and a vowel
                    if (
                        'consonant' === ConsonantsAndVowels::getKey($groupsExploded[0]) &&
                        'vowel' === ConsonantsAndVowels::getKey($groupsExploded[1])) {
                        $key = KeyAndPosition::getKeyName($groupsExploded[0]);
                        $position = KeyAndPosition::getPositionName($groupsExploded[1]);
                    } elseif (
                        'vowel' === ConsonantsAndVowels::getKey($groupsExploded[0]) &&
                        'consonant' === ConsonantsAndVowels::getKey($groupsExploded[1])) {
                        $key = KeyAndPosition::getKeyName($groupsExploded[1]);
                        $position = KeyAndPosition::getPositionName($groupsExploded[0]);
                    /*
                        If it's not, we have to push the second phoneme to the next group and so on
                        To do so, we go from the last group and push to the "right" of the array, and do so until we go to the current group
                    */
                    } else {
                        // Get the last index of the groups array
                        $tempIndex = sizeof($groups) - 1;

                        // Loop over all the groups until we get to the current index and only if the temp index is higher than 0
                        while ($tempIndex >= $index && $tempIndex > 0) {
                            // Get the phonemes of the current group and the previous one
                            $currentGroup = explode(';', $groups[$tempIndex]);
                            $previousGroup = explode(';', $groups[$tempIndex - 1]);
                            // If it's the last group and the last group is composed of 2 phonemes
                            if ($tempIndex === sizeof($groups) - 1 && 2 === sizeof($currentGroup)) {
                                // Push the last phoneme into a new group
                                array_push($groups, $currentGroup[1]);
                                // And only put the first phoneme in the group that is now the one before the last
                                $groups[$tempIndex] = $currentGroup[0];
                            }
                            // Add this condition in case if the first group with this kind of pattern is the first one in the word, so there's no previous one
                            if ($tempIndex > $index) {
                                // The current group is the second from the previous phoneme and the first of the current one
                                $groups[$tempIndex] = $previousGroup[1].';'.$currentGroup[0];
                                // The previous one only stays with the first phoneme
                                $groups[$tempIndex - 1] = $previousGroup[0];
                            }
                            --$tempIndex;
                        }
                        /*
                            Check if the phoneme is a consonant or a vowel and get the key and position accordingly
                            Since there's only 1 phoneme, we can get the key or position because which ones represent a blank
                        */
                        list($key, $position) = $this->getKeyAndPositionSinglePhoneme($groupsExploded);
                    }
                }
                array_push($images, $this->getImageFromModel($key, $position, $library_id));
                ++$index;
            }
        }

        return $images;
    }

    /**
     * Method to get the key and position in case of a single phoneme.
     *
     * @param array $groupsExploded : The 2 phonemes in the group
     *
     * @return array
     */
    private function getKeyAndPositionSinglePhoneme($groupsExploded)
    {
        $keyAndPosition = [];
        if ('consonant' === ConsonantsAndVowels::getKey($groupsExploded[0])) {
            $key = KeyAndPosition::getKeyName($groupsExploded[0]);
            $position = 'oh_le_lac';
        } elseif ('vowel' === ConsonantsAndVowels::getKey($groupsExploded[0])) {
            $key = 'fantome';
            $position = KeyAndPosition::getPositionName($groupsExploded[0]);
        }
        array_push($keyAndPosition, $key);
        array_push($keyAndPosition, $position);

        return $keyAndPosition;
    }

    /**
     * Method to get the image from the database.
     *
     * @param string $key        : Key for the LPC
     * @param string $position   : Position of the LPC
     * @param int    $library_id : Library selected
     *
     * @return string
     */
    private function getImageFromModel($key, $position, $library_id)
    {
        return \App\Key::where([
            'key'        => $key,
            'position'   => $position,
            'library_id' => $library_id,
        ])->first()->image;
    }

    /**
     * Method to split a word into groups of 2 phonemes.
     *
     * @param string $word : Word as phonemes
     *
     * @return array
     */
    private function split($word)
    {
        // Split the word into phonemes with the separator ';'
        $initial = explode(';', $word);
        // Create an array that will hold the final groups
        $final = [];

        /*
            Loop over all the phonemes in the word
            Gather the phonemes into groups of 2 phonemes
        */
        for ($index = 0; $index < sizeof($initial); $index += 2) {
            // Check if it's the last character to avoid arrays offsets
            $final[] = $initial[$index].(sizeof($initial) - 1 <= $index ? '' : ';'.$initial[$index + 1]);
        }

        return $final;
    }
}
