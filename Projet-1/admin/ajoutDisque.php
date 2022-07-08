<?php
	try
	{
    //Variables de tests
    //$_POST['titre']="Black City Parade";
    //$_POST['annee']="2013";
    //$_POST['code_label']=1;
    //$_POST['code_label']="1";
        require'../SQL/connectionBDD.php';
        //Conditionnement (nom artiste ou prenom artiste) et code artiste pas vide, on continue
        if(!empty($_POST['titre']) AND !empty($_POST['annee']) OR !empty($_POST['code_label']))
		{
            //Vérification du contenu $_POST
			//var_dump($_POST)
            //Préparation de la requête
			$req = $bdd->prepare("INSERT INTO disques (titre ,annee, code_label) VALUES (:titre, :annee, :code_label)");
			$data= ["titre" => $_POST['titre'],
    		"annee" => $_POST['annee'],
            //Force la valeur en INT
            "code_label" => $code_label=intval($_POST['code_label'])];
            $req->execute($data);
            // Redirection
            header('Location:gestionDisque.php');
        }
	}
    catch(Exception $e)
	{
		die('Erreur : ' . $e -> getMessage());
	}
