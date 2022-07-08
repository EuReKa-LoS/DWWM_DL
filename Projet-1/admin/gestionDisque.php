<!doctype html>
<html lang="en">

<!--Head-->
<?php
$optionTitle="Gestion des disques";
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
		<ul>
			<li><a href="gestion.php">Retour</a></li>
		</ul>
		<?php //Double formulaire de selection
		$fileForm = "ajoutDisque.php";
		$headerForm = "<span class='fast-flicker'>Ajou</span>t d'u<span class='flicker'>n disq</span>ue";
		//if (isset($_POST['code_disque']&&)) //Si une id est selectionner et le bouton suppresion pressé
		if (isset($_POST['code_disque'])) //Si une id est selectionner+valider alors modifier_article
		{
			$fileForm = "modifierDisque.php";
			$headerForm = "<span class='fast-flicker'>Modifi</span>cation d'u<span class='flicker'>n disq</span>ue";
		}
		/*
        {
			$fileForm = "supressionArtiste.php";
			$headerForm = "Supression de l'artiste";
		}
        */
		?>
		<form method="post" action="<?php echo $fileForm; ?>">
			<ul>
				<h1><?php echo $headerForm; ?></h1>
				<?php
				if (isset($_POST['code_disque'])) //Formulaire de modification si l'id à été selectionner
				{
					try {
						require '../SQL/connectionBDD.php';

						$req = $bdd->prepare('SELECT * FROM disques WHERE code_disque = ?');
						$req->execute(array($_POST['code_disque']));

						while ($donnees = $req->fetch()) {

				?>
							<li><label for="titre">Titre du disque: </label> : <input type="text" id="titre" name="titre" value="<?php echo $donnees['titre']; ?>"></li>
							<li><label for="annee">Année du disque: </label> : <input type="text" id="annee" name="annee" value="<?php echo $donnees['annee']; ?>"></li>
							<li><label for="code_label">Code label du disque: </label> : <input type="text" id="code_label" name="code_label" value="<?php echo $donnees['code_label']; ?>"></li>
							<input type="hidden" name="code_disque" value="<?php echo $_POST['code_disque'] ?>" /></li>
			</ul>
			<input type="submit" value="Mettre à jour" />
		</form>
		<form method="post" action="supressionDisque.php">
			<input type="hidden" name="code_disque" value="<?php echo $_POST['code_disque'] ?>" /></li>
			<input type="submit" value="Supprimer" />
	<?php
						} //while


					} catch (Exception $e) {
						die('Erreur : ' . $e->getMessage());
					}
				} //if
				else {
	?>
	<li><label for="titre">Titre du disque: </label> : <input type="text" id="titre" name="titre"></li>
	<li><label for="annee">Année du disque </label> : <input type="text" id="annee" name="annee"></li>
	<li><label for="code_label">Code du label</label> : <input type="text" id="code_label" name="code_label"></li>
	</ul>
	<input type="submit" value="Poster" /><input type="reset" value="Effacer" />
		</form>
		<?php

					try {
						require '../SQL/connectionBDD.php';

						$reponse = $bdd->query('SELECT code_disque, titre FROM disques');
		?>
			<form method="post" action="gestionDisque.php">
				<p>
					<label for="code_disque">
						<h1>

							<span class="fast-flicker">Choissis</span>ez le dis<span class="flicker">que à mod</span>ifier
						</h1>
					</label>
					<select name="code_disque" id="code_disque">
						<?php
						// Remplir le bouton avec les ID / code_disque
						while ($donnees = $reponse->fetch()) {
							$code_disque = $donnees['code_disque'];
							$titre = $donnees['titre'];
						?>

							<option value="<?php echo $code_disque; ?>">Disque : <?php echo $titre; ?> </option>
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
	<!--Consulter les Artiste-->
	<h1>
		<span class="fast-flicker">List</span>ing d<span class="flicker">es Dis</span>ques
	</h1>
	<?php
	try //connexion db
	{
		require '../SQL/connectionBDD.php';
		$req = $bdd->query("SELECT * FROM disques");	//Limites de cinqs message par date de création
		while ($donnees = $req->fetch())	//Debut de l'affichage
		{
	?>
			<p>Titre du disque: <?php echo ($donnees["titre"]); ?></p>
			<p>Année du disque: <?php echo ($donnees["annee"]); ?></p>
			<p>Code du disque: <?php echo ($donnees["code_disque"]); ?></p>
	<?php
		}
		$req->closeCursor();
	} catch (Exception $e) //Recupération Erreur
	{
		die('Erreur : ' . $e->getMessage()); //Affichage Erreur
	}
	?>
	<!--Consulter les Artiste-->
	</ul>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</div>
</body>
<footer></footer>

</html>