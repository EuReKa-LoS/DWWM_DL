<!doctype html>
<html lang="en">

<!--Head-->
<?php
$optionTitle="Gestion";
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
  <div class="text-center mt-4 name ">
    <ul>
      <li><a href="gestionArtiste.php">Gestion des artistes</a></li>
      <li><a href="gestionLabel.php">Gestion des Labels</a></li>
      <li><a href="gestionDisque.php">Gestion des disques</a></li>
    </ul>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </div>
</body>
<footer></footer>

</html>