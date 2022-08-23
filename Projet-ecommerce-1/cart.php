<?php
session_start();
// Varaible fonctionnement du site
require 'include/infos_shop.php';
require 'include/connect.php';
// Si l'utilisateur clic sur ajouter sur la page produit on peut check les données du formulaire
if (isset($_POST['idLivre'], $_POST['quantity']) && is_numeric($_POST['idLivre']) && is_numeric($_POST['quantity'])) {
    // Initialisation des valeurs POST pour une identification facile et force en valeur INT
    $idLivre = (int)$_POST['idLivre'];
    $quantity = (int)$_POST['quantity'];
    // Préparation de la requête SQL (pensé à en faire une fonction ou class)
    $stmt = $pdo->prepare('SELECT * FROM livres WHERE idLivre = ?');
    $stmt->execute([$_POST['idLivre']]);
    // Je chope les datas POST et je les claque dans un Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check si le produit existe
    if ($product && $quantity > 0) {
        // Le produit existe je met à jour le panier
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($idLivre, $_SESSION['cart'])) {
                // Le produit existe dans le panier je met à jour la quantité
                $_SESSION['cart'][$idLivre] += $quantity;
            } else {
                // Le produit n'est pas présent alors je l'ajoute.
                $_SESSION['cart'][$idLivre] = $quantity;
            }
        } else {
            // Si il n'y a pas de produit alors j'ajoute le premier
            $_SESSION['cart'] = array($idLivre => $quantity);
        }
    }
    // On évite le double sumission (changé le lien)
    header('location: cart.php');
    exit;
} // Ici c'est la supression du panier, vérification par le lien du "remove", si il y a id on delete
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
// Mise à jour de la quantité de produit dans le panier lors du clic "Update"
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Boucle pour mettre à jour la quantité de tout les produits
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Vérification de la quantité demandé par le panier et la quantité en stock (on ne peut vendre plus qu'on ne possède)
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Mise à jour nouvelle quantité
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // On évite le double sumission (changé le lien)
    header('location: cart.php');
    exit;
}
// On envoi l'utilisateur sur Checkout une fois le panier valider (ah et le panier ne doit pas être vide)
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}
// Vérification des variable de session du CART (Panier pour Hervé)
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// Si j'ai de sproduit dans le CART (Panier pour Hervé)
if ($products_in_cart) {
    // Il y a des produit dans le CART (Panier pour Hervé) alors je vais cherché les infos en base de donnée
    // Je sais pas comment expliqué plus clairement ca=>Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM livres WHERE idLivre IN (' . $array_to_question_marks . ')');
    // On prends les clés produit (pas les valeur), les clés sont les clés produit.
    $stmt->execute(array_keys($products_in_cart));
    // On chope les data de la BDD
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // On calcule le sous-total
    foreach ($products as $product) {
        $subtotal += (float)$product['prixLivre'] * (int)$products_in_cart[$product['idLivre']];
    }
}
?>
<!doctype html>
<html lang="en">

<?php
$path="styles.css";
include "include/head.php";
?>
<body>
<!-- HEADER -->
<?php include 'include/header.php' ?>
<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<?php include  'include/navbar.php' ?>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Panier</h3>
						<ul class="breadcrumb-tree">
							<li><a href="../index.php">Home</a></li>
							<li class="active">Panier</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Details Panier -->
						<div class="cart-details">
							<h1>Panier</h1>
							<form action="cart.php" method="post">
								<table>
									<thead>
										<tr>
											<td colspan="2">Produit</td>
											<td>Prix</td>
											<td>Quantité</td>
											<td>Total</td>
										</tr>
									</thead>
									<tbody>
										<?php if (empty($products)) : ?>
											<tr>
												<td colspan="5" style="text-align:center;">Aucun produit dans votre panier.</td>
											</tr>
										<?php else : ?>
											<?php foreach ($products as $product) : ?>
												<tr>
													<td class="img">
														<a href="product.php?idLivre=<?= $product['idLivre'] ?>">
															<img src="img/<?= $product['imgLivre'] ?>" width="45" height="85" alt="<?= $product['titreLivre'] ?>">
														</a>
													</td>
													<td>
														<a href="product.php?idLivre=<?= $product['idLivre'] ?>"><?= $product['titreLivre'] ?></a>
														<br>
														<a href="cart.php?remove=<?= $product['idLivre'] ?>" class="remove">Supprimer</a>
													</td>
													<td class="price">&euro;<?= $product['prixLivre'] ?></td>
													<td class="quantity">
														<input type="number" name="quantity-<?= $product['idLivre'] ?>" value="<?= $products_in_cart[$product['idLivre']] ?>" min="1" max="<?= $product['stockLivre'] ?>" placeholder="Quantity" required>
													</td>
													<td class="price">&euro;<?= $product['prixLivre'] * $products_in_cart[$product['idLivre']] ?></td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
								<div class="subtotal">
									<span class="text">Sous-Total</span>
									<span class="price">&euro;<?= $subtotal ?></span>
								</div>
								<div class="buttons">
									<input type="submit" value="Mettre à jour" name="update">
									<input type="submit" value="Passer la commande" name="placeorder">
								
								</div>
							</form>
						</div>
						<!-- /Details Panier -->

						
						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<?php include 'include/newsletter.php' ?>
		<!-- /NEWSLETTER -->
		<!-- FOOTER -->
		<?php include 'include/footer.php' ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
