<!doctype html>
<html lang="en">
<!--Head-->
<?php
$optionTitle="Connexion";
$path="../CSS/styles.css";
include "../include/head.php";
?>
<!--Head-->

<body>
  <nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand text-warning fs-1" href="../index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>

  <form class="position-absolute top-50 start-50 translate-middle" method="post" action="gestion.php">
    <div>
      <span class="far fa-user"></span>
      <input type="text" name="nom" placeholder="Nom" required>
    </div>
    <div>
      <span class="fas fa-key"></span>
      <input type="password" name="mdp" placeholder="password" required>
    </div>

    <button class="btn mt-3" href="gestion.php">Login</button>
    <a href="add.php" class="btn mt-3">Inscription</a>
  </form>


  </div>
</body>
<footer>


</footer>

</html>
<?php
require '../SQL/connectionBDD.php';

if (!empty($_POST['nom']) && !empty($_POST['mdp'])) {
  $nom = $_POST['nom'];
  $mdp = $_POST['mdp'];

  var_dump($nom);
  var_dump($mdp);

  $req = $bdd->prepare('SELECT * FROM users WHERE nom = :nom');
  $req->bindValue('nom', $nom);
  $req->execute();

  //Est-ce que c'est le bon utilisateur avec la bonne adresse 
  $res = $req->fetch(PDO::FETCH_ASSOC);
  if ($res) {

    //C'est qu'on récupère de la requête BDD
    $passwordHash = $res['mdp'];

    //On vérifie si le mot de passe correspond bien a celui que l'on connait
    if (password_verify($mdp, $passwordHash)) {
      header("Location: gestion.php");
      exit();
    } else {
      echo "Identifiants invalides";
    }
  } else {
    echo "Identifiants invalides";
  }
}

?>