<?php
		require 'connect.php';
			$req = $bdd->query("SELECT * FROM livres");
			while ($donnees = $req->fetch())
		{       
        $idLivre=$donnees['idLivre'];
		echo "<table><tr><td>";?>
		<p>Titre: <?php echo $donnees['titreLivre'] ?></p>
		</td><td>
		<p>Catégorie: <?php echo $donnees['categorieLivre'] ?></p>
		</td><td>
		<p>Description: <?php echo $donnees['descriptionLivre'] ?></p>
		</td><td>
		<p>Auteur: <?php echo $donnees['auteurLivre'] ?></p>
		</td><td>
		<p>De <?php echo $donnees['imgLivre'] ?></p>
		</td><td>
		<p>Stock: <?php echo $donnees['stockLivre'] ?></p>
		<?php echo "</td><td></table></tr>";
		}

		$fileForm = "add.php";
		$headerForm = "Ajouter un livre";
		//if (isset($_POST['idLivre']&&)) //Si une id est selectionner et le bouton suppresion pressé
		if (isset($_POST['idLivre'])) //Si une id est selectionner+valider alors modifier_article
		{
			$fileForm = "modifierArtiste.php";
			$headerForm = "<span class='fast-flicker'>Modifi</span>cation d'u<span class='flicker'>n art</span>iste";
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
				if (isset($_POST['idLivre'])) //Formulaire de modification si l'id à été selectionner
				{
					try {
						require '../SQL/connectionBDD.php';

						$req = $bdd->prepare('SELECT * FROM artistes WHERE idLivre = ?');
						$req->execute(array($_POST['idLivre']));

						while ($donnees = $req->fetch()) {

				?>
							<li><label for="nom_artiste">Nom de l'artiste:</label> : <input type="text" id="nom_artiste" name="nom_artiste" value="<?php echo $donnees['nom_artiste']; ?>"></li>
							<li><label for="prenom_artiste">Prenom de l'artiste:</label> : <input type="text" id="prenom_artiste" name="prenom_artiste" value="<?php echo $donnees['prenom_artiste']; ?>"></li>
							<input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
			</ul>
			<input type="submit" value="Mettre à jour" />
		</form>
		<form method="post" action="supressionArtiste.php">
			<input type="hidden" name="idLivre" value="<?php echo $_POST['idLivre'] ?>" /></li>
			<input type="submit" value="Supprimer" />
			<input type="submit" value="Supprimer" />
	<?php
						} //while


					} catch (Exception $e) {
						die('Erreur : ' . $e->getMessage());
					}
				} //if
				else {
	?>
	<li><label for="nom_artiste">Nom de l'artiste: </label> : <input type="text" id="nom_artiste" name="nom_artiste"></li>
	<li><label for="prenom_artiste">Prenom de l'artiste: </label> : <input type="text" id="prenom_artiste" name="prenom_artiste"></li>
	</ul>
	<input type="submit" value="Poster" /><input type="reset" value="Effacer" />
		</form>
		<?php

					try {
						require '../SQL/connectionBDD.php';

						$reponse = $bdd->query('SELECT code_artiste, nom_artiste FROM artistes');
		?>
			<form method="post" action="gestionArtiste.php">
				<p>
					<label for="code_artiste">
						<h1>

							<span class="fast-flicker">Choissis</span>er l'arti<span class="flicker">stes à mod</span>ifier
						</h1>
					</label>
					<select name="code_artiste" id="code_artiste">
						<?php
						// Remplir le bouton avec les ID / code_artiste
						while ($donnees = $reponse->fetch()) {
							$code_artiste = $donnees['code_artiste'];
							$nom_artiste = $donnees['nom_artiste'];
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
	<!--Consulter les Artiste-->
	<h1>
		<span class="fast-flicker">List</span>ing d<span class="flicker">es Ar</span>tistes
	</h1>
	<?php
	try //connexion db
	{
		require '../SQL/connectionBDD.php';
		$req = $bdd->query("SELECT * FROM artistes");	//Limites de cinqs message par date de création
		while ($donnees = $req->fetch())	//Debut de l'affichage
		{
	?>
			<p>Nom de l'artiste: <?php echo ($donnees["nom_artiste"]); ?></p>
			<p>Prenom de l'artiste: <?php echo ($donnees["prenom_artiste"]); ?></p>
			<p>Code artiste: <?php echo ($donnees["code_artiste"]); ?></p>
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