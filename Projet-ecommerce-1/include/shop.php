<?php
	//Affichage avec IMG
		require 'connect.php';
			$query = $pdo->query("SELECT * FROM livres INNER JOIN categories ON livres.categorieLivre = categories.id ORDER BY date DESC LIMIT 3 ");
			while ($donnees = $query->fetch())
		{
            ?>
<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src=<?php echo "img/".$donnees['imgLivre']?> alt=<?php echo $donnees['titreLivre'] ?> width="200" height="450">
							</div>
							<div class="shop-body">
								<h3><?php echo $donnees['titreLivre'] ?></h3>
								<a href="product.php?idLivre=<?=$donnees['idLivre']?>" class="cta-btn">Acheter Maintenant <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
<?php 
                }
                /*



<div class="recentlyadded content-wrapper">
    <h2>Ajout récent</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $livre): ?>
        <!--<a href="index.php?page=livre&id=<?=$livre['idLivre']?>" class="livre">-->
            <a href="index.php?page=livre&idLivre=<?=$livre['idLivre']?>" class="livre">
            <img src="../<?=$livre['imgLivre']?>" width="200" height="300" alt="<?=$livre['titreLivre']?>">
            <span class="name"><?=$livre['titreLivre']?></span>
            <span class="price">
                &euro;<?=$livre['prixLivre']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
*/
	?>