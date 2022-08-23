<?php
?>
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">A Propos De Nous</h3>
                        <p>Voici notres projet</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i><?= $shopadress?></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i><?= $shoptel?></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i><?= $shopmail?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Offre Du Moments</a></li>
                            <li><a href="#">Livres Neufs</a></li>
                            <li><a href="#">Livres D'occasions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Informations</h3>
                        <ul class="footer-links">
                            <li><a href="#">A Propos</a></li>
                            <li><a href="#">Contactez Nous</a></li>
                            <li><a href="#">Police Privé</a></li>
                            <li><a href="#">Retour De Produit</a></li>
                            <li><a href="#">Conditions D'utilisation</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Services</h3>
                        <ul class="footer-links">
                            <?php 
                            //si session active affiché mon compte sinon connexion
                            if (isset($_SESSION['prenom']) and isset($_SESSION['nom']))
                            {
                            echo "<li><a href='/admin/dashboard.php'>Mon compte</a></li>";
                            echo "<li><a href='/admin/logout.php'>Déconnexion</a></li>";
                            }
                            else
                            {
                            echo "<li><a href='/admin/connexion.php'>Connexion</a></li>";
                            
                            }

                            ?>
                            <li><a href="#">Mon Panier</a></li>

                            
                            <li><a href="#">Favoris</a></li>
                            <li><a href="#">Suivre Mon Colis</a></li>
                            <li><a href="#">Aide</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Droit Reservé | Le template a était fait par Dany, Hervé, Davy, Kévin <a href="https://colorlib.com" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->