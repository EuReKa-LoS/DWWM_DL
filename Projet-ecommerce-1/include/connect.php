<?php
        try//connexion db
		{
		    $pdo = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD avec spécification UTF-8
			$pdo->exec('SET NAMES "UTF8"');
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
	?>
