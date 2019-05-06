import sys
from phonemizer.phonemize import phonemize

return phonemize(text=sys.argv[1], language="fr-fr", backend="espeak")