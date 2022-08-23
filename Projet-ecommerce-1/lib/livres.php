<?php
 class Livre
 {
    public $idLivre;
    public $titreLivre;
    public $categorieLivre;
    public $descriptionLivre;
    public $auteurLivre;
    public $imgLivre;
    public $etatLivre;
    public $reEditionLivre;
    public $stockLivre;
    public $prixLivre;
    public $codeBarreLivre;
    public $ISBN;
    public $dateParution;
    public $date;
 }

 /**
  * @return Livre[]
  */
function get_all_livres(): array
{
    try//connexion db
		{
    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
    $pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
    $query = $pdo->query("SELECT * FROM livres");
    return $query->fetchAll(PDO::FETCH_CLASS, Category::class); 
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
}

function get_new_livres(): array
{
  try//connexion db
		{
    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
    $pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
    $query = $pdo->query("SELECT * FROM livres WHERE etatLivre=1");
    return $query->fetchAll(PDO::FETCH_CLASS, Category::class); 
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
}

function get_used_livres(): array
{
  try//connexion db
		{
    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
    $pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
    $query = $pdo->query("SELECT * FROM livres WHERE etatLivre=0");
    return $query->fetchAll(PDO::FETCH_CLASS, Category::class); 
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
}