<h1>Recherche</h1>
<table class="table-books">
    <form method="post" action="index.php" class="form-books" enctype="multipart/form-data">
        <li><label for="titreLivre">Titre: </label><input type="text" id="titreLivre" name="titreLivre" required="" ></li>
        <?php /*Ajouté les checkbox pour les catégorie
        <li><label for="categorieLivre">Categorie du livre: </label><input type="text" id="categorieLivre" name="categorieLivre" required=""></li>
        */ ?>
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