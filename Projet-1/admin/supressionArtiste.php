<?php
    //Variables de tests
    //$_POST['nom_artiste']="Felix";
    //$_POST['prenom_artiste']="Mendelssohn";
    //$_POST['code_artiste']=9;
	try
	{
		require'../SQL/connectionBDD.php';
		if(!empty($_POST['code_artiste']))
		{
            $code_artiste = intval($_POST['code_artiste']);
            $req = $bdd->prepare("DELETE FROM artistes where code_artiste='$code_artiste'");
			$req->execute();
header('Location:gestionArtiste.php');
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }
