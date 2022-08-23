<?php
        try//connexion db
		{
		    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
			$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
	?>
