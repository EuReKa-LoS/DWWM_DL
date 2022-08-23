
<?php

if (isset($_POST['books'])) {
    try {
        if (isset($_FILES['imgLivre'])) {
            $tmpName = $_FILES['imgLivre']['tmp_name'];
            $name = $_FILES['imgLivre']['name'];
            $size = $_FILES['imgLivre']['size'];
            $error = $_FILES['imgLivre']['error'];
            if(isset($_POST['etatLivre'])){
                $etatLivre=1;
            }
            else{
            $etatLivre=0;
            }
            if(isset($_POST['reEditionLivre'])){            
            $reEditionLivre=1;
            }
            else{
            $reEditionLivre=0;
            }

            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));

            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 1500000;

            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName . "." . $extension;
                //$file = 5f586bf96dcd38.73540086.jpg
                move_uploaded_file($tmpName, '../img/' . $file);
                $pathImg =  $file; //Pour avoir un string /img/nomImage.jpg
                require 'connect.php';
                $sql = "INSERT INTO livres (titreLivre, categorieLivre, descriptionLivre, auteurLivre, imgLivre, etatLivre, reEditionLivre, stockLivre, prixLivre, codeBarreLivre, ISBN, date) 
                        VALUES (:titreLivre, :categorieLivre, :descriptionLivre, :auteurLivre, :imgLivre, :etatLivre, :reEditionLivre, :stockLivre, :prixLivre, :codeBarreLivre, :ISBN ,NOW())";
                $req = $pdo->prepare($sql);
                $data = [
                    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
                    'titreLivre' => htmlspecialchars($_POST['titreLivre'], ENT_QUOTES),
                    'categorieLivre' => $_POST['categorieLivre'],
                    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
                    'descriptionLivre' => htmlspecialchars($_POST['descriptionLivre'], ENT_QUOTES),
                    // HTMLSPECIACHAR permet de convertir le chaine de caractères en entité HTML/ENT_QUOTES convertis les " et '
                    'auteurLivre' => htmlspecialchars($_POST['auteurLivre'], ENT_QUOTES),
                    'imgLivre' => $pathImg,
                    'etatLivre' => $etatLivre,
                    'reEditionLivre' => $reEditionLivre,
                    'stockLivre' => intval($_POST['stockLivre']),
                    'prixLivre' => doubleval($_POST['prixLivre']),
                    'codeBarreLivre' => $_POST['codeBarreLivre'],
                    'ISBN' => $_POST['ISBN']
                    
                ];
                $req->execute($data);
            } else {
                if($size>$maxSize){
                    echo "Taille de l'image trop grande !</br>Taille max 1.5Mo</br>";
                }
                echo "Une erreur est survenue";
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<?php //Catégorie
require 'connect.php';
$categories = get_all_categories();
?>
<!-- Formulaire ajout du livre -->
<h1>Ajout de livre</h1>
<table class="table-books">
    <form method="post" action="dashboard.php" class="form-books" enctype="multipart/form-data">
        <li><label for="titreLivre">Titre du livre: </label><input type="text" id="titreLivre" name="titreLivre" required="" ></li>
        <!-- </label><input type="text" id="categorieLivre" name="categorieLivre" required=""></li> -->
        <li><label for="categorieLivre">Categorie du livre: </label>
        <select name="categorieLivre" id="categorieLivre">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id ?>"><?= $category->nameCategorie ?></option>
            <?php endforeach ?>
        </select>
        <li><label for="descriptionLivre">Description du livre:</label><li>
        <li><textarea id="descriptionLivre" name="descriptionLivre" rows="10px" cols="50px"></textarea></li>
        <li><label for="auteurLivre"></label>Auteur du livre: <input type="text" id="auteurLivre" name="auteurLivre" required=""></li>
        <!-- Gestion file -->
        <li><label for="imgLivre">Jaquette du livre: </label> : <input type="file" id="imgLivre" name="imgLivre" required=""></li>
        <!-- Fin gestion file -->

        <li><label for="etatLivre"></label>Livre neuf: <input type="checkbox" id="etatLivre" name="etatLivre" value="1"></li>
        <li><label for="reEditionLivre"></label>Le livre est une réédition: <input type="checkbox" id="reEditionLivre" name="reEditionLivre" /></li>
        <li><label for="stockLivre"></label>Stock du livre: <input type="text" id="stockLivre" name="stockLivre" /></li>
        <li><label for="prixLivre">Prix du livre: </label> : <input type="text" id="prixLivre" name="prixLivre" /></li>
        <li><label for="codeBarreLivre">Code Barre: </label> : <input type="text" id="codeBarreLivre" name="codeBarreLivre" /></li>
        <li><label for="ISBN">ISBN: </label> : <input type="text" id="ISBN" name="ISBN" /></li>
        <input type="submit" name="books" value="Ajouter" />
    </form class="form-books">
</table class="table-books">