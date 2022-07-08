<?php
    //Variables de tests
    //$_POST['code_disque']=1;
	try
	{
		require'../SQL/connectionBDD.php';
		if(!empty($_POST['code_disque']))
		{
            $code_disque = intval($_POST['code_disque']);
            $req = $bdd->prepare("DELETE FROM disques where code_disque='$code_disque'");
			$req->execute();
header('Location:gestionDisque.php');
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }
