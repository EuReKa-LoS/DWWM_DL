<?php
        try//connexion db
		{
		    $bdd = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD avec spécification UTF-8
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
			$bdd->exec('SET NAMES "UTF8"'); // Spécification UTF-8
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
	?>
