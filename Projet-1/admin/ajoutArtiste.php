<?php
	try
	{
    //Variables de tests
    //$_POST['nom_artiste']="Sirkis";
    //$_POST['prenom_artiste']="Nicola";
        require'../SQL/connectionBDD.php';
        //Conditionnement (nom artiste ou prenom artiste) et code artiste pas vide, on continue
        if(!empty($_POST['nom_artiste']) OR !empty($_POST['prenom_artiste']) AND !empty($_POST['code_artiste']))
		{
            //Vérification du contenu $_POST
			//var_dump($_POST)
            //Préparation de la requête
			$req = $bdd->prepare("INSERT INTO artistes (nom_artiste, prenom_artiste) VALUES (:nom_artiste, :prenom_artiste)");
			$data= ["nom_artiste" => $_POST['nom_artiste'],
    		"prenom_artiste" => $_POST['prenom_artiste']];
            $req->execute($data);
            // Redirection
            header('Location:gestionArtiste.php');
        }
	}
    catch(Exception $e)
	{
		die('Erreur : ' . $e -> getMessage());
	}
