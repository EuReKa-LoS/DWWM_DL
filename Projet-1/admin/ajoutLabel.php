<!doctype html>
<html lang="en">

<!--Head-->
<?php
$optionTitle="Ajout de Label";
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
    <li><a href="modifLabel.php">Modifier un label</a></li>
    <li><a href="suppLabel.php">Suprimer un label</a></li>
    </ul>
  </div class="menu">
  </nav><!-- end of top nav -->
  <header class="text-center mt-4 name">
    <div class="sign2">
      <h1><span class="fast-flicker">Ajout</span>er u<span class="flicker">n La</span>bel</h1>
    </div>

    <form class="position-absolute top-50 start-50" style="margin-left:-90px" action="ajoutLabel.php" method="post">

      <input type="text" name="nom_label">
      <input type="submit" name="btn" value="Ajouter">


    </form>

    <?php
    require '../SQL/connectionBDD.php';
    if (!empty($_POST['nom_label'])) {
      $nom_label = $_POST['nom_label'];

      var_dump($nom_label);

      $req = $bdd->prepare("INSERT INTO Labels(nom_label,code_label) VALUES (:nom_label, :code_label)");
      $req->bindValue('nom_label', $nom_label);
      $req->bindValue('code_label', $code_label);
      $req->execute();

      if ($req) {
        header("location: gestionLabel.php");
        exit();
      }
    } else {
      //  echo "mdp incorrecte";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </div>
</body>
<footer></footer>

</html>

</body>
<footer></footer>

</html>