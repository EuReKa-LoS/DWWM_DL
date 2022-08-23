<?php
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']):0;
$num_fav = isset($_SESSION['fav']) ? count($_SESSION['fav']):0;
?>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i><?= $shoptel?></a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i><?= $shopmail?></a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i><?= $shopadress?></a></li>
					</ul>
					<ul class="header-links pull-right">
						<!-- <li><a href="#"><i class="fa fa-dollar"></i> Inscription</a></li> -->
                        <?php 
                        //si session active affiché mon compte sinon connexion
                        if (isset($_SESSION['prenom']) and isset($_SESSION['nom']))
                        {
                          echo "<li><a href='/admin/dashboard.php'><i class='fa fa-user-o'></i> Mon compte</a></li>";
						  echo "<li><a href='/admin/logout.php'>Déconnexion</a></li></ul>";
                        }
                        else
                        {
                          echo "<li><a href='/admin/connexion.php'><i class='fa fa-user-o'></i> Connexion</a></li>";
						  /*echo "<li><form method='post' action='/admin/connexion.php'>
                            	<input type='submit' name='Sinscrire' value='Sinscrire'>
                        		</form></li>";
							*/
                        }

                        ?>
						
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/index.php" class="logo">
									<img src="/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<!--<form>
									<select class="input-select">
										<option value="0">Choisis</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
										<option value="1">Category 03</option>
										<option value="1">Category 04</option>
										<option value="1">Category 05</option>
										<option value="1">Category 06</option>
									</select>
									<input class="input" placeholder="Recherche ici">
									<button class="search-btn">Recherche</button>
								</form>-->
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<!--
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Favoris</span>
										
										<div class="qty"><?= $num_fav?></div>
									</a>
					-->
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Panier</span>
										<div class="qty"><?= $num_items_in_cart?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="../projet-site-biblio/img/product1.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">titre du livre</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>980.00 €</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="../projet-site-biblio/img/product2.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">titre du livre</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>980.00 €</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Objet(s) selectionner</small>
											<h5>TOTAL DU PANIER : 2940.00 €</h5>
										</div>
										<div class="cart-btns">
											<a href="cart.php">Voir le panier</a>
											<a href="checkout.php">Valider  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->