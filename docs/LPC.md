# How LPC works

## Explanation of positions and keys names in database

Each key and position were named after an image that the client sent. The image contains all the keys and positions with an example word for each of them. I used these words to put in the keys table, specifically in the fields : key and position. So when encoding a sentence to LPC code, the phonèmes will find the key and position with these names and ask for the database to find the image.