<?php
    //Variables de tests
    //$_POST['nom_artiste']="Felix";
    //$_POST['prenom_artiste']="Mendelssohn";
    //$_POST['code_artiste']=9;
	try
	{
		require'../SQL/connectionBDD.php';
		if(!empty($_POST['titre']) AND !empty($_POST['annee']) AND !empty($_POST['code_disque']) OR !empty($_POST['code_label']))
		{
            $titre =$_POST['titre'];
            $annee = $_POST['annee'];
            $code_label =intval($_POST['code_label']);
            $code_disque = $_POST['code_disque'];
            //var_dump($code_artiste);
            // 
            $req = $bdd->prepare("UPDATE disques SET titre='$titre', annee='$annee', code_label='$code_label' WHERE code_disque='$code_disque'");
			$req->execute();

            
		// Redirection
            header('Location:gestionDisque.php');
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }
