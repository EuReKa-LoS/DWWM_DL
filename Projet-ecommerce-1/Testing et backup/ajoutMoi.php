<?php
if (isset($_POST['books'])) {
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
                //$sql = "INSERT INTO livres (titreLivre, categorieLivre, descriptionLivre, auteurLivre, imgLivre, etatLivre, reEditionLivre, stockLivre, prixNeufLivre, prixOccasionLivre, codeBarreLivre, ISBN) VALUES (:titreLivre, :categorieLivre, :descriptionLivre, :auteurLivre, :imgLivre, :etatLivre, :reEditionLivre, :stockLivre, :prixNeufLivre, :prixOccasionLivre, :codeBarreLivre, :ISBN)";
                $sql = "INSERT INTO livres (titreLivre, categorieLivre, descriptionLivre, auteurLivre, imgLivre, etatLivre, reEditionLivre, stockLivre, prixNeufLivre, prixOccasionLivre) 
                        VALUES (:titreLivre, :categorieLivre, :descriptionLivre, :auteurLivre, :imgLivre, :etatLivre, :reEditionLivre, :stockLivre, :prixNeufLivre, :prixOccasionLivre)";
                $req = $bdd->prepare($sql);
                $data = [
                    'titreLivre' => $_POST['titreLivre'],
                    'categorieLivre' => $_POST['categorieLivre'],
                    'descriptionLivre' => $_POST['descriptionLivre'],
                    'auteurLivre' => $_POST['auteurLivre'],
                    'imgLivre' => $pathImg,

                    'etatLivre' => $_POST['etatLivre'],
                    'reEditionLivre' => $_POST['reEditionLivre'],
                    'stockLivre' => $_POST['stockLivre'],

                    'prixNeufLivre' => $_POST['prixNeufLivre'],
                    'prixOccasionLivre' => $_POST['prixOccasionLivre']
                ];
                $req->execute($data);
            } else {
                echo "Une erreur est survenue";
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<!-- Formulaire ajout du livre -->
<h1>Ajout de livre</h1>
<table class="table-books">
    <form method="post" action="index.php" class="form-books" enctype="multipart/form-data">
        <li><label for="titreLivre">Titre du livre: </label><input type="text" id="titreLivre" name="titreLivre" /></li>
        <li><label for="categorieLivre">Categorie du livre: </label><input type="text" id="categorieLivre" name="categorieLivre" /></li>
        <li><label for="descriptionLivre">Description du livre: </label><input type="textare" id="descriptionLivre" name="descriptionLivre" /></li>
        <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre" /></li>
        <!-- Gestion file -->
        <li><label for="imgLivre">Jaquette du livre: </label> : <input type="file" id="imgLivre" name="imgLivre" /></li>
        <!-- Fin gestion file -->
        <!-- Valeur par défaut de la checkbox etatLivre=0 si vide -->
        <input type="hidden" name="etatLivre" value="0">
        <!-- Valeur par défaut de la checkbox etatLivre=1 si cocher -->
        <li><label for="etatLivre"></label>Etat du livre: <input type="checkbox" id="etatLivre" name="etatLivre" /></li>
        <!-- Valeur par défaut de la checkbox reEditionLivre=0 si vide -->
        <input type="hidden" name="reEditionLivre" value="0">
        <!-- Valeur par défaut de la checkbox reEditionLivre=1 si cocher -->
        <li><label for="reEditionLivre"></label>Réédition du livre: <input type="checkbox" id="reEditionLivre" name="reEditionLivre" /></li>
        <li><label for="stockLivre"></label>Stock du livre: <input type="text" id="stockLivre" name="stockLivre" /></li>
        <li><label for="prixNeufLivre">Prix neuf: </label> : <input type="text" id="prixNeufLivre" name="prixNeufLivre" /></li>
        <li><label for="prixOccasionLivre">Prix Occasion: </label> : <input type="text" id="prixOccasionLivre" name="prixOccasionLivre" /></li>
        <input type="submit" name="books" value="Ajouter" />
    </form class="form-login">
</table class="table-login">
<form method="post" action="login.php">
</form>