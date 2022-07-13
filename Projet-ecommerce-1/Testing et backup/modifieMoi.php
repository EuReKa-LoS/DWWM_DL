<?php //Double formulaire de selection
//Table: livres
//idLivre, titreLivre, categorieLivre, descriptionLivre, auteurLivre, imgLivre, etatLivre, reEditionLivre, stockLivre, prixNeufLivre, prixOccasionLivre, codeBarreLivre, ISBN
$fileForm = "ajoutMoi.php";
$headerForm = "<h1>Ajout d'un livre</h1>";
/*
Idea update
if etat OR reedition
*/
if (isset($_POST['idLivre'])) //Si une id est selectionner+valider alors modifier_article
{
    $fileForm = "modifieMoi.php";
    $headerForm = "<h1>Modification d'un livre</h1>";
}

?>
<form method="post" action="<?php echo $fileForm; ?>">
    <ul>
        <h1><?php echo $headerForm; ?></h1>
        <?php
        if (isset($_POST['idLivre'])) //Formulaire de modification si l'id à été selectionner
        {
            try {
                require '../SQL/connectionBDD.php';

                $req = $bdd->prepare('SELECT * FROM livres WHERE idLivre = ?');
                $req->execute(array($_POST['idLivre']));

                while ($donnees = $req->fetch()) {
                    //Une idlivre est selectionner je remplis mon tableau avec les datas associer
        ?>
                    <input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
                    <li><label for="titreLivre">Titre du livre: </label> : <input type="text" id="titreLivre" name="titreLivre" value="<?php echo $donnees['titreLivre']; ?>"></li>
                    <li><label for="categorieLivre">Categorie du livre: </label> : <input type="text" id="categorieLivre" name="categorieLivre" value="<?php echo $donnees['categorieLivre']; ?>"></li>
                    <li><label for="descriptionLivre">Description du livre:</label> : <input type="text" id="descriptionLivre" name="descriptionLivre" value="<?php echo $donnees['descriptionLivre']; ?>"></li>
                    <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre" value="<?php echo $donnees['auteurLivre']; ?>"></li>
                    <li><label for="imgLivre">Jaquette du livre: </label> : <input type="file" id="imgLivre" name="imgLivre" value="<?php echo $donnees['imgLivre']; ?>"></li>
                    <li><label for="etatLivre">Etat du livre: </label> : <input type="text" id="etatLivre" name="etatLivre" value="<?php echo $donnees['etatLivre']; ?>"></li>
                    <li><label for="reEditionLivre">Réédition: </label> : <input type="text" id="reEditionLivre" name="reEditionLivre" value="<?php echo $donnees['reEditionLivre']; ?>"></li>
                    <li><label for="stockLivre">Stock: </label> : <input type="text" id="stockLivre" name="stockLivre" value="<?php echo $donnees['stockLivre']; ?>"></li>
                    <li><label for="prixNeufLivre">Prix neuf: </label> : <input type="text" id="prixNeufLivre" name="prixNeufLivre" value="<?php echo $donnees['prixNeufLivre']; ?>"></li>
                    <li><label for="prixOccasionLivre">Prix Occasion: </label> : <input type="text" id="prixOccasionLivre" name="prixOccasionLivre" value="<?php echo $donnees['prixOccasionLivre']; ?>"></li>
                    <li><label for="codeBarreLivre">Code Barre: </label> : <input type="text" id="codeBarreLivre" name="codeBarreLivre" value="<?php echo $donnees['codeBarreLivre']; ?>"></li>
                    <li><label for="ISBN">ISBM: </label> : <input type="text" id="ISBN" name="ISBN" value="<?php echo $donnees['ISBN']; ?>"></li>
    </ul>
    <input type="submit"  value="Mettre à jour" />
</form>
<form method="post" action="deleteMoi.php">
    <input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
    <input type="submit" value="Supprimer" />
<?php
                } //while


            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        } //if
        else {
?>
<li><label for="titreLivre">Titre du livre: </label> : <input type="text" id="titreLivre" name="titreLivre">
<li><label for="categorieLivre">Categorie du livre: </label> : <input type="text" id="categorieLivre" name="categorieLivre">
<li><label for="descriptionLivre">Description du livre:</label> : <input type="text" id="descriptionLivre" name="descriptionLivre">
<li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre">
<li><label for="imgLivre">Jaquette du livre: </label> : <input type="file" id="imgLivre" name="imgLivre">
<!--<li><label for="etatLivre">Etat du livre: </label> : <input type="text" id="etatLivre" name="etatLivre">-->
<li><label for="etatLivre">Etat du livre: </label> : <input type="checkbox" id="etatLivre" name="etatLivre" value="1" />
<!--<li><label for="reEditionLivre">Réédition: </label> : <input type="text" id="reEditionLivre" name="reEditionLivre">-->
<li><label for="reEditionLivre">Réédition: </label> : <input type="checkbox" id="reEditionLivre" name="reEditionLivre" value="1" />

<li><label for="stockLivre">Stock: </label> : <input type="text" id="stockLivre" name="stockLivre">
<li><label for="prixNeufLivre">Prix neuf: </label> : <input type="text" id="prixNeufLivre" name="prixNeufLivre">
<li><label for="prixOccasionLivre">Prix Occasion: </label> : <input type="text" id="prixOccasionLivre">
<li><label for="codeBarreLivre">Code Barre: </label> : <input type="text" id="codeBarreLivre" name="codeBarreLivre">
<li><label for="ISBN">ISBM: </label> : <input type="text" id="ISBN" name="ISBN">
</ul>
<input type="submit" name="books" value="Ajouter" /><input type="reset" value="Effacer" />
</form>
<?php

            try {
                require '../SQL/connectionBDD.php';

                $reponse = $bdd->query('SELECT idLivre, titreLivre FROM livres');
?>
    <form method="post" action="modifieMoi.php">
        <p>
            <label for="idLivre">
                <h1>

                    <span class="fast-flicker">Choissis</span>er l'arti<span class="flicker">stes à mod</span>ifier
                </h1>
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
if (isset($_POST['diego'])) {
    try {
        if (isset($_FILES['imgLivre'])) {
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
                $bdd = new PDO('mysql:host=localhost;dbname=librairie', 'root', ''); //Connexion BDD avec spécification UTF-8
                $bdd->exec('SET NAMES "UTF8"');
                $sql = "INSERT INTO livres (titreLivre, categorieLivre, descriptionLivre, auteurLivre, imgLivre, etatLivre, reEditionLivre, stockLivre, prixNeufLivre, prixOccasionLivre, codeBarreLivre, ISBN) 
                        VALUES (:titreLivre, :categorieLivre, :descriptionLivre, :auteurLivre, :imgLivre, :etatLivre, :reEditionLivre, :stockLivre, :prixNeufLivre, :prixOccasionLivre, :codeBarreLivre, :ISBN)";
                //$sql = "INSERT INTO livres (titreLivre, categorieLivre, imgLivre, auteurLivre,  prixNeufLivre, prixOccasionLivre) VALUES (:titreLivre, :categorieLivre, :imgLivre, :auteurLivre,  :prixNeufLivre, :prixOccasionLivre)";
                $req = $bdd->prepare($sql);
                $data = [
                    'titreLivre' => $_POST['titreLivre'],
                    'categorieLivre' => $_POST['categorieLivre'],
                    'descriptionLivre' => $_POST['descriptionLivre'],
                    'auteurLivre' => $_POST['auteurLivre'],
                    'imgLivre' => $pathImg,
                    //'etatLivre' => $_POST['etatLivre'],
                    //'reEditionLivre' => $_POST['reEditionLivre'],
                    'stockLivre' => $_POST['stockLivre'],
                    'prixNeufLivre' => floatval($_POST['prixNeufLivre']),
                    'prixOccasionLivre' => floatval($_POST['prixOccasionLivre']),
                    'codeBarreLivre' => $_POST['codeBarreLivre'],
                    'ISBN' => $_POST['ISBN']
                ];
                $req->execute($data);
                var_dump($data);
            } else {
                echo "Une erreur est survenue";
            }
        }
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


?>
