<?php
session_start();
// Varaible fonctionnement du site
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
            <?php
            $config_bdd = "../include/connect.php";
            //Programme des festivité:
            // Si $_Session est set
            //Ne rien faire ->redirection ../index.php (la personne n'as rien à faire là)
            //Sinon
            // si POST login set
            //requête de login avec check BDD
            //stockage variable
            //sinon c'est POST signup qui est SET
            //Proposé connexion
            //Ou
            //Proposé inscription

            // Si la session est déjà active
            if (
                isset($_SESSION['prenom']) and isset($_SESSION['nom'])

            ) {
                echo "<ul><li>Vous êtes déjà connecté<P></li>";
                echo "<Li><a href='dashboard.php'>Gestion du compte</li>";
                echo "<li><a href='logout.php'>Déconnexion</a></li></ul>";

            } else {
                //Formulaire de connexion est remplis
                if (isset($_POST['login'])) {
                    //Si les champs email et mdp ne sont aps vide
                    if (empty($_POST['email_users']) || empty($_POST['password_users'])) {
                        echo "Both field are required";
                    } else {
                        //J'ai besoin de la Base de Donnée
                        require $config_bdd;
                        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                        //$email_users_post = [$_POST['email_users']];
                        $stmt->execute([$_POST['email_users']]);
                        $user = $stmt->fetch(); //fetchAll(PDO::FETCH_ASSOC);//
                        //var_dump($user);
                        //Vérification si le mot de passe du formulaire est identique à celui en BDD
                        if ($user && password_verify($_POST['password_users'], $user['password'])) {
                            $fullname=$user['first_name']." ".$user['last_name'];;
                            $_SESSION['prenom'] = $user['first_name'];
                            $_SESSION['nom'] = $user['last_name'];
                            $_SESSION['id_user']=$user['id_user'];
                            echo "Bonjour ".$fullname."</br>";
                            echo "<a href='dashboard.php'>Gestion du compte</a>";
                            //Le header semble pété
                            //header('location:dashboard.php');
                        } else {
                            echo "Identifiants  Inwalid";
                        }
                    }
                }
                //Sinon si le formulaire d'inscription est remplis
                elseif (isset($_POST['signup'])) {
                    $password_hash = password_hash($_POST['signup_password_users'], PASSWORD_DEFAULT);
                    try {
                        //J'ai besoin de la Base de Donnée
                        require $config_bdd;
                        //Vérification complexité mot de passe
                        //WIP
                        //Insertion des infos clients
                        /*
                                first_name
                                last_name
                                email
                                password
                                gender
                                address
                                role 
                                */
                        $req = $pdo->prepare('INSERT INTO users (first_name , last_name, email, password, gender, role ) VALUES (:first_name, :last_name, :email, :password_hash, :gender, :role)');
                        $data = [
                            'first_name' => $_POST['signup_first_name'],
                            'last_name' => $_POST['signup_last_name'],
                            'email' => $_POST['signup_email_users'],
                            'gender' => $_POST['signup_gender'],
                            'password_hash' => $password_hash,
                            'role' => 0
                        ];
                        $req->execute($data);
                        //header("location:login.php");
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                } else {
                    if (empty($_POST['Sinscrire'])) {
                        //Si le bouton "Sinscrire" est vide, affiché le fomulaire de connexion
            ?>
                        <!-- Formulaire de connexion -->
                        <h1>Connexion</h1>
                        <table class="table-login">
                            <form method="post" action="connexion.php" class="form-login">
                                <li><label for="email_users">Email: </label> : <input type="text" id="email_users" name="email_users" required></li>
                                <li><label for="password_users">Mot de passe: </label> : <input type="password" id="password_users" name="password_users" required></li>
                                <!--<li><label for="forget_password">Mot de passe oublier</label><input type="checkbox"></li>-->
                                <input type="submit" name="login" value="Connexion" /><input type="reset" value="Effacer" />
                            </form class="form-login">
                        </table class="table-login">
                        <form method="post" action="connexion.php">
                            <input type="submit" name="Sinscrire" value="Sinscrire">
                        </form>
                    <?php }
                }
                //Si le bouton "Sinscrire" est cliquer, affiché le fomulaire d'incription et masque celui de connexion
                if (isset($_POST['Sinscrire'])) { ?>
                    <h1>Inscription</h1>
                    <table class="table-signup">
                        <form method="post" action="ajoutUtilisateur.php" class="form-login">
                            <li><label for="signup_first_name">Prénom: </label> : <input type="text" id="signup_first_name" name="signup_first_name" required></li>
                            <li><label for="signup_last_name">Nom: </label> : <input type="text" id="signup_last_name" name="signup_last_name" required></li>
                            <li><label for="signup_email_users">Email: </label> : <input type="email" id="signup_email_users" name="signup_email_users" size="30" required></li>
                            <li><label for="signup_gender ">Sexe: </label> : <input type="text" id="signup_gender " name="signup_gender"></li>
                            <?php /*
                                Masculin
                                Féminin
                                Trans* masculin / Homme trans*
                                Trans* féminine / Femme trans*
                                Genderqueer
                                Je refuse de répondre
                                */ ?>
                            <li><label for="signup_password_users">Mot de passe: </label> : <input type="password" id="signup_password_users" name="signup_password_users"required></li>
                            <li><label for="signup_confirm_password_users">Confirmer le mot de passe: </label> : <input type="password" id="confirm_password_users" name="confirm_password_users"required></li>
                            <input type="submit" name="signup" value="Inscription" /><input type="reset" value="Effacer" />
                        </form class="form-signup">
                    </table class="table-signup">
            <?php }
            } ?>
            
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