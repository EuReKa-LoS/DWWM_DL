<?php
	//Affichage avec IMG
		require 'connect.php';
			$query = $pdo->query("SELECT * FROM livres");
			while ($donnees = $query->fetch())
		{
		echo "<table><tr><td>";?>
		<p>Titre: <?php echo $donnees['titreLivre'] ?> </p>
		</td><td>
		<p>Catégorie: <?php echo $donnees['categorieLivre'] ?> </p>
		</td><td>
		<p>Description: <?php echo $donnees['descriptionLivre'] ?> </p>
		</td><td>
		<!-- Check de l'état -->
		<?php if($donnees['etatLivre']==0){
			echo "<p>Etat: Occasion.</p>";
			}
			else{
				echo "<p>Etat: Neuf.</p>";
			}
		?>
		</td><td>
		<!-- Check de l'édition -->
		<?php if($donnees['reEditionLivre']==0){
			echo "<p>Le livre est une rééition</p>";
			}
			else{
				echo "<p>Le livre est un original</p>";
			}
		?>
		</td><td>
		<p>Auteur: <?php echo $donnees['auteurLivre'] ?> </p>
		</td><td>
		<img src=<?php echo $donnees['imgLivre']?> alt="" width="80" height="120">
		</td><td>
		<p>Stock: <?php echo $donnees['stockLivre'] ?> </p>
		<?php echo "</td><td></table></tr>";
		}
    ?>