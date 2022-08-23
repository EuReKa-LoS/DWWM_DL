<?php
 class Category
 {
    public $id;
    public $slug;
    public $name;
 }

 /**
  * @return Category[]
  */
function get_all_categories(): array
{
    try//connexion db
		{
		    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
			$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
            $query = $pdo->query("SELECT * FROM categories");
            return $query->fetchAll(PDO::FETCH_CLASS, Category::class); 
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
}
?>