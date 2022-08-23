<?php
session_start();
// Varaible pour le menu Hot Deal
require '../include/infos_shop.php';
?>
<!doctype html>
<html lang="en">

<?php
$path = "styles.css";
require "../include/head.php";
?>

<body>
    <?php require "../include/header.php" ?>
    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <?php require "../include/navbar.php" ?>
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
            <h1>Espace utilisateur</h1>
            <p><?php echo "Bonjour ".$_SESSION['prenom'] ?></p>
            <!-- Vérification si l'utilisateur est Admin via l'id :) -->
            <?php
            $config_bdd = "../include/connect.php";
            require $config_bdd;
            $checkRole = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
            $checkRole->execute([$_SESSION['id_user']]);
            $user = $checkRole->fetch(); //fetchAll(PDO::FETCH_ASSOC);//
            if($user['role']==1)
            {
                require '../lib/databases.php';
                require '../lib/categories.php';
                require '../include/modifieMoi.php';
            }
            else
            {
                echo "<li><a href='logout.php'>Déconnexion</a></li></ul>";
            }
            ?>
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
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    
		<!-- NEWSLETTER -->
		<?php require '../include/newsletter.php' ?>
		<!-- /NEWSLETTER -->
		<!-- FOOTER -->
		<?php require '../include/footer.php' ?>
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