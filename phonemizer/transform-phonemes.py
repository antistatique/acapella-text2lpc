import sys
from phonemizer.phonemize import phonemize

# Get the phonemes from phonemizer. Remove the '-' characters from the results as they are useless
phonemes = phonemize(text=sys.argv[1].replace(',', '').replace('.', ''), language="fr-fr", backend="espeak").replace('-', '').replace('ː', '').replace(' ', '')
# Create an array that will hold the words with the ';' characters as separation between each phoneme
final_words = []
words = phonemes.split(" ")
for word in words:
    final_word = ""
    # Loop through every phoneme in a word
    for index, phoneme in enumerate(word):
        '''
            This is the important part of the separation.
            With certain phonemes, it is counted as 2 characters, which creates errors.
            To solve this issue, we split the phonemes with ';'

            First we check if the character that is the second unicode character in the faulty phonemes is not present in the word
            If it is, only put the phoneme and not the separator
            If not, put the separator and check if it's not the last phoneme in the word so we don't put a ';' at the end of the word
        '''
        if u"\u0303" not in word[index + 1 if index + 1 <= len(word) - 1 else index]:
            if index + 1 <= len(word) - 1:
                final_word += (phoneme + ";")
            else:
                final_word += phoneme
        else:
            final_word += phoneme
    final_words.append(final_word)
# Join all the words to create a single string and print it so PHP can catch it
print(' '.join(final_words))