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