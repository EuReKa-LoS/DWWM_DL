<!doctype html>
<html lang="en">

<!--Head-->
<?php
$optionTitle="Suppresion de Label";
$path="../CSS/styles.css";
include "../include/head.php";
?>
<!--Head-->

<body>
  <nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand text-warning fs-1" href="gestion.php">Retour Gestion</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>
  <div class="text-center mt-4 name ">
    <li><a href="gestionLabel.php">Retour</a></li>
    <li><a href="ajoutLabel.php">Ajouter un label</a></li>
    <li><a href="modifLabel.php">Modifier un label</a></li>
    </ul>
  </div class="menu">
  </nav><!-- end of top nav -->
  </header>
  <div class="sign2">
    <h1><span class="fast-flicker">Supprim</span>er u<span class="flicker">n La</span>bel</h1>
  </div>

  <form class="position-absolute top-50 start-50 translate-middle" action="suppLabel.php" method="post">
    code du label :
    <input type="text" name="code_label">
    <input type="submit" name="btn" value="Supprimer">
  </form><br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </div>
  <div id="listing" class="position-absolute top-50 start-50" style="margin-left:-90px">
    <?php
    try //connexion db
    {
      require '../SQL/connectionBDD.php';

      if (!empty($_POST['code_label'])) {
        $code_label = intval($_POST['code_label']);
        $req = $bdd->prepare("DELETE FROM labels where code_label = $code_label");
        $req->execute();
      }
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    ?>
    <!--Consulter des labels-->
    <h2>
      <h1><span class="fast-flicker">List</span>ing d<span class="flicker">es l</span>abe<span class="flicker">ls</span></h1>
    </h2>
    <?php
    try //connexion db
    {
      require '../SQL/connectionBDD.php';
      $req = $bdd->query("SELECT * FROM Labels");  //Limites de cinqs message par date de création
      while ($donnees = $req->fetch())  //Debut de l'affichage
      {
    ?>
        <p>Nom du label: <?php echo ($donnees["nom_label"]); ?></p>
        <p>Code label: <?php echo ($donnees["code_label"]); ?></p>
    <?php
        // var_dump($donnees);
      }
      $req->closeCursor();
    } catch (Exception $e) //Recupération Erreur
    {
      die('Erreur : ' . $e->getMessage()); //Affichage Erreur
    }
    ?>
    <!--Consulter des labels-->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </div>
</body>
<footer></footer>

</html>