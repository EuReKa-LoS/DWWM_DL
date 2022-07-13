<?php
        if (isset($_POST['idLivre'])) //Formulaire de modification si l'id à été selectionner
        {
            try {
                require 'SQL/connectionBDD.php';

                $req = $bdd->prepare('SELECT * FROM livres WHERE idLivre = ?');
                $req->execute(array($_POST['idLivre']));

                while ($donnees = $req->fetch()) {
                    //Une idlivre est selectionner je remplis mon tableau avec les datas associer
        ?>          
                    <form method="post" action="index.php">
                <ul>
                    <h1>Modification d'un livre</h1>
                    <input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
                    
                    <li><label for="titreLivre">Titre du livre: </label><input type="text" id="titreLivre" name="titreLivre" value="<?php echo $donnees['titreLivre']; ?>"/></li>
                    <li><label for="categorieLivre">Categorie du livre: </label><input type="text" id="categorieLivre" name="categorieLivre" value="<?php echo $donnees['categorieLivre']; ?>"/></li>
                    <li><label for="descriptionLivre">Description du livre: </label><input type="textare" id="descriptionLivre" name="descriptionLivre" value="<?php echo $donnees['descriptionLivre']; ?>"/></li>
                    <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre" value="<?php echo $donnees['auteurLivre']; ?>"/></li>
                    <!-- Gestion file -->
                    <li><label for="imgLivre">Jaquette du livre: </label> : <img src="<?php echo $donnees['imgLivre'];?>" class="img-rounded" width="80" height="120">
				                                                            <input type="file" name="imgLivre" required="" accept="*/image"></li>
                    <!-- Fin gestion file -->
                    <!-- Valeur par défaut de la checkbox etatLivre=0 si vide -->
                    <?php
                    if ($donnees['etatLivre']==1)
                    {
                        echo"
                        <li><label for='etatLivre'>Etat du livre: </label><input type='checkbox' id='etatLivre' name='etatLivre' checked></li>
                        ";
                    }
                    else{
                        echo "
                        <li><label for='etatLivre'>Etat du livre: </label><input type='checkbox' id='etatLivre' name='etatLivre' />
                        ";
                    }
                    if ($donnees['reEditionLivre']==1)
                    {
                        echo"
                        <li><label for='reEditionLivre'>Réédition du livre: </label>Etat du livre: <input type='checkbox' id='reEditionLivre' name='reEditionLivre' checked></li>
                        ";
                    }
                    else{
                        echo "
                        <li><label for='reEditionLivre'>Réédition du livre: </label>Etat du livre: <input type='checkbox' id='reEditionLivre' name='reEditionLivre' />
                        ";
                    }?>
                    <li><label for="stockLivre"></label>Stock du livre: <input type="text" id="stockLivre" name="stockLivre" value="<?php echo $donnees['stockLivre']; ?>"/></li>
                    <li><label for="prixNeufLivre">Prix neuf: </label> : <input type="text" id="prixNeufLivre" name="prixNeufLivre" value="<?php echo $donnees['prixNeufLivre']; ?>"></li>
                    <li><label for="prixOccasionLivre">Prix Occasion: </label> : <input type="text" id="prixOccasionLivre" name="prixOccasionLivre" /></li>
                    
                    
    </ul>
    <input type="submit" name="Updating" value="Mettre à jour" />
</form>
<form method="post" action="index.php">
    <input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
    <input type="submit" name="Deleting" value="Supprimer" />
<?php
                } //while


            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
} //if
else
{
//
//Selecteur
            try {
                require 'SQL/connectionBDD.php';
                $reponse = $bdd->query('SELECT idLivre, titreLivre FROM livres');
?>
    <form method="post" action="index.php">
        <p>
            <label for="idLivre">
                <h1>Livre à modifier</h1>
            </label>
            <select name="idLivre" id="idLivre">
                <?php
                // Remplir le bouton avec les ID / Titre de livre
                while ($donnees = $reponse->fetch()) {
                    $code_artiste = $donnees['idLivre'];
                    $nom_artiste = $donnees['titreLivre'];
                ?>

                    <option value="<?php echo $code_artiste; ?>">Artiste : <?php echo $nom_artiste; ?> </option>
                <?php
                }
                ?>

            </select>
        </p>
        <input type="submit" value="Choisir" />
    </form>
<?php
                $reponse->closeCursor();
            } catch (Exception $e) //Recupération Erreur
            {
                die('Erreur : ' . $e->getMessage()); //Affichage Erreur
            }
        } //else
?>





<?php
if (isset($_POST['Updating'])) {
echo "Couack !";
    try {
        /*if (isset($_FILES['imgLivre'])) {
            echo "imgLivre is set";
            $tmpName = $_FILES['imgLivre']['tmp_name'];
            $name = $_FILES['imgLivre']['name'];
            $size = $_FILES['imgLivre']['size'];
            $error = $_FILES['imgLivre']['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 400000;

            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName . "." . $extension;
                //$file = 5f586bf96dcd38.73540086.jpg
                move_uploaded_file($tmpName, './img/' . $file);
                $pathImg = './img/' . $file; //Pour avoir un string /img/nomImage.jpg
                */  
                    $bdd = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD avec spécification UTF-8
                    $bdd->exec('SET NAMES "UTF8"');
                    //Traitement de l'image
                    $stmt_select=$bdd->prepare('SELECT * FROM livres WHERE idLivre=:idLivre');
                    $stmt_select->execute(array(':idLivre'=>$_POST['idLivre']));
                    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
                    if (isset($_POST['Updating']) AND isset($_FILES['imgLivre'])) {
                        echo "IMG is SET !";
                        /*unlink($imgRow['imgLivre']); // Prend directement la ligne dans la BDD
                    $idLivre = intval($_POST['idLivre']);
                        $tmpName = $_FILES['imgLivre']['tmp_name'];
                        $name = $_FILES['imgLivre']['name'];
                        $size = $_FILES['imgLivre']['size'];
                        $error = $_FILES['imgLivre']['error'];
            
                        $tabExtension = explode('.', $name);
                        $extension = strtolower(end($tabExtension));
            
                        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                        $maxSize = 400000;
            
                        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            
                            $uniqueName = uniqid('', true);
                            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                            $file = $uniqueName . "." . $extension;
                            //$file = 5f586bf96dcd38.73540086.jpg
                            move_uploaded_file($tmpName, './img/' . $file);
                            $pathImg = './img/' . $file; //Pour avoir un string /img/nomImage.jpg

                    //si $_POST'imgLivre'] est set*/
                    }
                    else
                    {
                        /*
$sql = "UPDATE INTO livres SET titreLivre='$titreLivre', categorieLivre='$categorieLivre', descriptionLivre='$descriptionLivre', 
                    auteurLivre='$auteurLivre', imgLivre='$imgLivre', etatLivre='$etatLivre', reEditionLivre='$reEditionLivre', stockLivre='$stockLivre', 
                    prixNeufLivre='$prixNeufLivre', prixOccasionLivre='$prixOccasionLivre', codeBarreLivre='$codeBarreLivre', ISBN='$ISBN')";
                    $req = $bdd->prepare($sql);
                    $titreLivre =$_POST['titreLivre'];
                    $categorieLivre =$_POST['categorieLivre'];
                    $descriptionLivre =$_POST['descriptionLivre'];
                    $auteurLivre = $_POST['auteurLivre'];
                    $imgLivre = $pathImg;
                    $etatLivre = $_POST['etatLivre'];
                    $reEditionLivre = $_POST['reEditionLivre'];
                    $stockLivre = $_POST['stockLivre'];
                    $prixNeufLivre = floatval($_POST['prixNeufLivre']);
                    $prixOccasionLivre = floatval($_POST['prixOccasionLivre']);
                    $codeBarreLivre = $_POST['codeBarreLivre'];
                    $ISBN = $_POST['ISBN'];
                $req->execute();
                    }*/
                }   

                    
            /*} else {
                echo "Une erreur est survenue";
            }*/
        // IMG}
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/*
Ceci est du HTML

<!-- Formulaire ajout du livre -->
<h1>Ajout de livre</h1>
<table class="table-books">
    <form method="post" action="index.php" class="form-books" enctype="multipart/form-data">
        <li><label for="titreLivre">Titre du livre: </label> : <input type="text" id="titreLivre" name="titreLivre"></li>
        <li><label for="categorieLivre">Categorie du livre: </label> : <input type="text" id="categorieLivre" name="categorieLivre"></li>
        <!-- Gestion file -->
        <li><label for="imgLivre">Jaquette du livre: </label> : <input type="file" id="imgLivre" name="imgLivre"></li>
        <!-- Fin gestion file -->
        <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre"></li>
        <li><label for="prixNeufLivre">Prix neuf: </label> : <input type="text" id="prixNeufLivre" name="prixNeufLivre"></li>
        <li><label for="prixOccasionLivre">Prix Occasion: </label> : <input type="text" id="prixOccasionLivre" name="prixOccasionLivre"></li>
        <input type="submit" name="books" value="Ajouter" />
    </form class="form-books">
</table class="table-books">
<form method="post" action="login.php">
</form>
*/
    try
	{
		require'SQL/connectionBDD.php';
		if(!empty($_POST['Deleting']))
		{   
            //Supression de l'image associer au livre
            $stmt_select=$bdd->prepare('SELECT * FROM livres WHERE idLivre=:idLivre');
            $stmt_select->execute(array(':idLivre'=>$_POST['idLivre']));
            $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
            unlink($imgRow['imgLivre']); // Prend directement la
            //Supression du livre
            $idLivre = intval($_POST['idLivre']);
            $req = $bdd->prepare("DELETE FROM livres where idLivre='$idLivre'");
			$req->execute();
            header("Refresh:0; url=index.php");
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }

?>