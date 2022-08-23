<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'librairie';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
		$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
		}
		catch(Exception $e) //Recupération Erreur
		{
			die('Erreur : '.$e->getMessage()); //Affichage Erreur
		}
}


// Template header, feel free to customize this
function template_header($title) {
    // Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Système de panier</h1>
                <nav>
                    <ul>
                    <li><a href="../../index.php">Accueil (sortir de la zone de test)</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=products">Produits</a></li>
                    
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
/*/function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            
        </footer>
    </body>
</html>
EOT;
}*/
?>