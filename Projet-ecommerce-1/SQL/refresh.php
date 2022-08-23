<?php
// Redirection obligatoire si pas admin
redirect_unless_admin();

// Creation utilisateurs

// Creation catégorie
$pdo ->exec('CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    slug TEXT NOT NULL,
    name TEXT NOT NULL
    )');
    /*
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    slug TEXT NOT NULL,
    nameCategorie TEXT NOT NULL
);
INSERT INTO categories (slug, nameCategorie) VALUES ('amour','Amour');
INSERT INTO categories (slug, nameCategorie) VALUES ('aventure','Aventure');
INSERT INTO categories (slug, nameCategorie) VALUES ('bande-dessinee','Bande dessinée');
INSERT INTO categories (slug, nameCategorie) VALUES ('fantastique','Fantastique');
INSERT INTO categories (slug, nameCategorie) VALUES ('fantasy','Fantasy');
INSERT INTO categories (slug, nameCategorie) VALUES ('manga','Manga');
INSERT INTO categories (slug, nameCategorie) VALUES ('policier','Policier');
INSERT INTO categories (slug, nameCategorie) VALUES ('science-fiction','Science Fiction');
INSERT INTO categories (slug, nameCategorie) VALUES ('young-adult','Young Adult');
    */
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('amour','Amour')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('aventure','Aventure')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('bande-dessinee','Bande dessinée')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('fantastique','Fantastique')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('fantasy','Fantasy')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('manga','Manga')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('policier','Policier')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('science-fiction','Science Fiction')");
$pdo ->exec("INSERT INTO categories (slug, name) VALUES ('young-adult','Young Adult')");


// Création livres

?>