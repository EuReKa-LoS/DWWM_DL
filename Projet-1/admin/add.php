<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php
$optionTitle = "Inscription";
$path = "../CSS/styles.css";
include "../include/head.php";
?>
<!--Head-->

<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand text-warning fs-1" href="connexion.php">Retour</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>
  <header class="text-center mt-4 name">
<div class="sign2">
      <h1><span class="fast-flicker">Insc</span>rip<span class="flicker">tion</span></h1>
    </div>
        <form class="position-absolute top-50 start-50" style="margin-left:-90px" method="post" action="add.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="mdp" placeholder="Pass-word" required>
            </div>

            <button type="submit" value="Ajouter" class="btn mt-3">Inscription</button>
        </form>

        <div class="text-center fs-6">

        </div>
    
</body>

</html>

<?php



require '../SQL/connectionBDD.php';



if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp'])) {

    if (strlen($_POST['mdp']) > 8) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $req = $bdd->prepare("INSERT INTO users(nom,prenom,mdp) VALUES (:nom, :prenom, :mdp)");
        $req->bindValue('nom', $nom);
        $req->bindValue('prenom', $prenom);
        $req->bindValue('mdp', $mdp);
        $res = $req->execute();

        if ($res) {
            header("location:../../index.php");
            exit();
        }
    } else {
        echo "<p>Le mot de passe doit faire au moins 8 caractères.</p>";
    }
}

?>