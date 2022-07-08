<?php
    //Variables de tests
    //$_POST['nom_artiste']="Felix";
    //$_POST['prenom_artiste']="Mendelssohn";
    //$_POST['code_artiste']=9;
	try
	{
		require'../SQL/connectionBDD.php';
		if(!empty($_POST['nom_artiste']) OR !empty($_POST['prenom_artiste']) AND !empty($_POST['code_artiste']))
		{
            $nom_artiste =$_POST['nom_artiste'];
            $prenom_artiste = $_POST['prenom_artiste'];
            $code_artiste = $_POST['code_artiste'];
            //var_dump($code_artiste);
            // 
            $req = $bdd->prepare("UPDATE artistes SET nom_artiste='$nom_artiste', prenom_artiste='$prenom_artiste' WHERE code_artiste='$code_artiste'");
			$req->execute();

            
		// Redirection
            header('Location:gestionArtiste.php');
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }
