<?php
	//Affichage avec IMG
		require 'connect.php';
			$query = $pdo->query("SELECT * FROM livres INNER JOIN categories ON livres.categorieLivre = categories.id");
			while ($donnees = $query->fetch())
		{
		echo "<table><tr><td>";?>
		<p>Titre: <?php echo $donnees['titreLivre'] ?> </p>
		</td><td>
		<p>Catégorie: <?php echo $donnees['nameCategorie'] ?> </p>
		</td><td>
		<p>Description:
<p id="descriptionLivre" name="descriptionLivre">
		<?php echo $donnees['descriptionLivre'] ?>
					   </p>
		</td><td>
		<!-- Check de l'état -->
		<?php if($donnees['etatLivre']==0){
			echo "<p>Etat: <div class=\"text-warning\">Occasion</div>.</p>";
			}
			else{
				echo "<p>Etat: <div class=\"text-success\">Neuf<div>.</p>";
			}
		?>
		</td><td>
		<!-- Check de l'édition -->
		<?php if($donnees['reEditionLivre']==0){
			echo "<div class=\"text-success\"><p>Le livre est un original</p>";
			
			}
			else{
				echo "<div class=\"text-warning\"><p>Le livre est une rééition</p>";
			}
		?>
		</td><td>
		<p>Auteur: <?php echo $donnees['auteurLivre'] ?> </p>
		</td><td>
		<img src=<?php echo $donnees['imgLivre']?> alt="" width="80" height="120">
		</td><td>
		<p>Stock: <?php echo $donnees['stockLivre'] ?> </p>
		</td><td>
		<?php if($donnees['etatLivre']==0)
			{
			echo "<p>Prix neuf: ".$donnees['prixLivre']." €</p>";
			}
			else
			{
				echo "<p>Prix occasion: ".$donnees['prixLivre']." €</p>";
			}
			?>
		</td><td>
		<p>Code Barre: <?php echo $donnees['codeBarreLivre'] ?> </p>
		</td><td>
		<p>ISBN: <?php echo $donnees['ISBN'] ?> </p>
		<?php echo "</td><td></table></tr>";
		}
    ?>