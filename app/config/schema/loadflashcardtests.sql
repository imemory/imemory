DROP TABLE IF EXISTS temp_flashcards;
CREATE TEMP TABLE temp_flashcards (
    id    INTEGER NOT NULL,
    front VARCHAR NOT NULL,
    back  VARCHAR NOT NULL,
    tag   VARCHAR NOT NULL
);

\copy temp_flashcards FROM 'flashcards.csv' WITH DELIMITER AS ',' CSV QUOTE AS '"'
