<?php
        try//connexion db
		{
		    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', ''); //Connexion BDD avec spécification UTF-8
			$bdd->exec('SET NAMES "UTF8"');
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
	?>
