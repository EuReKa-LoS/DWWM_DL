<?php
        if (isset($_POST['idLivre'])) //Formulaire de modification si l'id à été selectionner
        {
            try {
                require 'connect.php';
                $categories = get_all_categories();

                //$req = $pdo->prepare('SELECT * FROM livres WHERE idLivre = ?');
                $req = $pdo->prepare('SELECT * FROM livres INNER JOIN categories ON livres.categorieLivre = categories.id WHERE idLivre = ?');
                $req->execute(array($_POST['idLivre']));

                while ($donnees = $req->fetch()) {
                    //Une idlivre est selectionner je remplis mon tableau avec les datas associer
        ?>          
                    <form method="post" action="dashboard.php" class="form-books"  enctype="multipart/form-data">
                <ul>
                    <h1>Modification d'un livre</h1>
                    <input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
                    
                    <li><label for="titreLivre">Titre du livre: </label><input type="text" id="titreLivre" name="titreLivre" value="<?php echo $donnees['titreLivre']; ?>"/></li>

                    <li><label for="categorieLivre">Categorie du livre: </label>
                        <select name="categorieLivre" id="categorieLivre">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->id ?>" 
                                
                                ><?= $category->nameCategorie ?></option>
                            <?php endforeach ?>
                        </select>
                    <li><label for="descriptionLivre">Description du livre: </label><textarea id="descriptionLivre" name="descriptionLivre" rows="10px" cols="50px"><?php echo $donnees['descriptionLivre']; ?></textarea></li>
                    <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre" value="<?php echo $donnees['auteurLivre']; ?>"/></li>
                    <!-- Gestion file -->
                    <li><label for="imgLivre">Jaquette du livre: </label> : <img src="<?php echo "../img/".$donnees['imgLivre'];?>" class="img-rounded" width="80" height="120" />
                                                                            <input type="file" id="imgLivreUpdated" name="imgLivreUpdated" /></li>
                    <!-- Fin gestion file -->            
                    <li><label for="stockLivre"></label>Stock du livre: <input type="text" id="stockLivre" name="stockLivre" value="<?php echo $donnees['stockLivre']; ?>"/></li>
                    <li><label for="prixLivre">Prix neuf: </label> : <input type="text" id="prixLivre" name="prixLivre" value="<?php echo $donnees['prixLivre']; ?>"></li>
                    <li><label for="prixLivre">Code Barre: </label> : <input type="text" id="codeBarreLivre" name="codeBarreLivre" value="<?php echo $donnees['codeBarreLivre']; ?>"></li>
                    <li><label for="prixLivre">ISBN: </label> : <input type="text" id="ISBN" name="ISBN" value="<?php echo $donnees['ISBN']; ?>"></li>

                    
                    
    </ul>
    <input type="submit" name="Updating" value="Mettre à jour" />
</form>
<form method="post" action="dashboard.php">
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

    require 'ajoutMoi.php';
//Selecteur
            try {
                require 'connect.php';
                $reponse = $pdo->query('SELECT idLivre, titreLivre FROM livres');
?>
    <form method="post" action="dashboard.php">
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
                    <option value="<?php echo $code_artiste; ?>"><?php echo $nom_artiste; ?> </option>
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
if (isset($_POST['Updating']) AND (isset($_POST['idLivre']))) {
    $idLivre=$_POST['idLivre'];
    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
    $titreLivre=htmlspecialchars($_POST['titreLivre'], ENT_QUOTES);
    $categorieLivre=$_POST['categorieLivre'];
    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
    $descriptionLivre= htmlspecialchars($_POST['descriptionLivre'], ENT_QUOTES);
    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
    $auteurLivre= htmlspecialchars($_POST['auteurLivre'], ENT_QUOTES);
    $stockLivre=$_POST['stockLivre'];
    $prixLivre=$_POST['prixLivre'];
    $codeBarreLivre=$_POST['codeBarreLivre'];
    $ISBN=$_POST['ISBN'];
    //Variable pour l'image
    $tmpName = $_FILES['imgLivreUpdated']['tmp_name']; // dossier temp du server
    $name = $_FILES['imgLivreUpdated']['name']; // nom de l'image
    $size = $_FILES['imgLivreUpdated']['size']; // Taille de l'image
    $error = $_FILES['imgLivreUpdated']['error']; // Erreur si il y a
    try {
        require 'connect.php';
        echo "Updating et IDLivre sont set</br>";

    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }   
    if (isset($_POST['Updating']) AND empty($tmpName))
    {
        echo "Updating est set mais pas IMG</br>";
        echo "SI l'image est pas set on la garde</br>";
                $req = $pdo->prepare("UPDATE livres SET titreLivre='$titreLivre' , categorieLivre='$categorieLivre' , descriptionLivre='$descriptionLivre' , auteurLivre='$auteurLivre' , stockLivre='$stockLivre' , prixLivre='$prixLivre' , codeBarreLivre='$codeBarreLivre', ISBN='$ISBN', date = NOW() WHERE idLivre='$idLivre'"); //
                $req->execute();
    }
    else
    {   
        if($tmpName != "")
        {
            echo "Updating et IMGUpdating sont SET</br>";
            echo "C'est ici que je traite l'image</br>";

            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));

            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 400000;

            
            //Je selectionne et supprime l'ancienne image
            $stmt_select=$pdo->prepare('SELECT * FROM livres WHERE idLivre=:idLivre');
            $stmt_select->execute(array(':idLivre'=>$_POST['idLivre']));
            $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
            //Ici je supprime l'image dans le dossier
            // Prend directement la valeur en bdd exemple /img/eragon.jpg
            var_dump($imgRow['imgLivre']);
            unlink("../img/".$imgRow['imgLivre']);
            //Ici je commence à upload la nouvelle image
            $stmt_select->closeCursor();
            echo "Je traite le nouvelle image";
            echo "Suppression image OK</br>";
        
            echo "Ajout nouvelle image";
            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName . "." . $extension;
                //$file = 5f586bf96dcd38.73540086.jpg
                move_uploaded_file($tmpName, '../img/' . $file);
                $pathImg = $file; //Pour avoir un string /img/nomImage.jpg
                require 'connect.php';
                $pdo->exec('SET NAMES "UTF8"');
                $sql = "UPDATE livres SET titreLivre='$titreLivre' , categorieLivre='$categorieLivre' , descriptionLivre='$descriptionLivre' , auteurLivre='$auteurLivre', imgLivre='$pathImg' , stockLivre='$stockLivre' , prixLivre='$prixLivre' , codeBarreLivre='$codeBarreLivre', ISBN='$ISBN' , date = NOW() WHERE idLivre='$idLivre'";
                $req = $pdo->prepare($sql);
                $req->execute();
            } else {
                echo "Une erreur est survenue";
            }
        }
    }
    unset($_POST['idLivre']);
}
else{

}



    try
	{
		require 'connect.php';
		if(!empty($_POST['Deleting']))
		{   
            //Supression de l'image associer au livre
            $stmt_select=$pdo->prepare('SELECT * FROM livres WHERE idLivre=:idLivre');
            $stmt_select->execute(array(':idLivre'=>$_POST['idLivre']));
            $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
            unlink("../img".$imgRow['imgLivre']); // Prend directement la
            //Supression du livre
            $idLivre = intval($_POST['idLivre']);
            $req = $pdo->prepare("DELETE FROM livres where idLivre='$idLivre'");
			$req->execute();
            header("Refresh:0; url=dashboard.php");
        }
        }
	    catch(Exception $e)
	    {
		die('Erreur : ' . $e -> getMessage());
	    }

?>