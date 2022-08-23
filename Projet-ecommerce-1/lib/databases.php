<?php
function pdo()
{
    static $pdo;
    if($pdo){
        return $pdo;
    }

    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
	$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
    return $pdo;
}
// Fonction qui va aller cherche les élements d'une table
/*
function find_all($table)
{
    $query = pdo()->query("SELECT * FROM {$table}");
    return $query->fetchAll(PDO::FETCH_CLASS, $class);
}
*/
?>