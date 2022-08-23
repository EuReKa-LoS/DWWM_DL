<!-- store products -->
<div class="row">
    <!-- product -->
    <?php
    $promo=false;
    while ($donnees = $query->fetch()) {
    ?>

        <div class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img src=<?php echo "img/".$donnees['imgLivre'] ?> alt="Jaquette de <?= $donnees['titreLivre'] ?>">
                </div>
                <div class="product-body">
                    <p class="product-category"><?php echo $donnees['nameCategorie'] ?></p>
                    <h3 class="product-name"><a href="product.php?idLivre=<?=$donnees['idLivre']?>"><?php echo $donnees['titreLivre'] ?></a></h3>
                    <?php
                    if($promo === true)
                    {
                    ?>
                    <h4 class="product-price">prix sans solde € <del class="product-old-price"><?= $donnees['prixLivre']?></del></h4>
                    <?php
                    }
                    else
                    {
                    ?>
                        <h4 class="product-price"><?= $donnees['prixLivre']?></h4>
                    <?php
                    }
                    ?>
                    <div class="product-rating">
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter aux favoris</span></button>
                        <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">vue rapide</span></button>
                    </div>
                </div>
                <div class="add-to-cart">
                <?php
                // Si il y a du stock on affiche juste un bouton désactiver "Indisponible"
                if($donnees['stockLivre']==0)
				{?>
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart" disabled></i> Indisponible</button>
                <?php
                }
                else
                {   
                    // Si il y a du stock on affiche le bouton d'ajout au panier et dans la requête on envoi en quantité 1 (pré-requis)
                    ?>
                    <form action="cart.php?page=cart" method="post">
                
                    <input type="hidden" name="idLivre" value="<?=$donnees['idLivre']?>">
                    <input type="hidden" name="quantity" value="1">
                    <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> ajouter au panier</button>
                    </form>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
        <!-- /product -->

    <?php
    }
    ?>
</div>
<!-- /store products -->