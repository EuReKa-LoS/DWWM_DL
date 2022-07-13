<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<body>
    <?php
    // Si la session est déjà active
    if (isset($_SESSION['email_users']) and isset($_SESSION['password_users'])) {
        //Bha c'est que t'es déjà connecter t'as rien à foutre ici :)
        header('Location: ../index.php');
        // Les actions suivantes sont "normalement" inutile grâce au header
        //echo "Vous êtes déjà connecter";
        //echo "<a href=\"logout.php\">Déconnexion</a>";
    } else {
        require '../include/connect.php';
        if (isset($_POST['login'])) {
            //J'ai besoin de la Base de Donnée
            
            //Ma petite requête
            $query = $pdo->prepare("SELECT * FROM customers WHERE email_users =:email_username password =:password");
            // J'execute ma petite requête
            $query->execute(
                array(
                    'email_username'     =>     $_POST["email_users"],
                    'password'     =>     password_verify($_POST["password_users"], PASSWORD_DEFAULT)
                )
            );
            $count = $query->rowCount();
            if ($count > 0) {
                $_SESSION["username"] = $_POST["username"];
                header("location:login_success.php");
            } else {
                $message = '<label>Wrong Data</label>';
            }
            /*
            $first_name = $user['first_name'];
            // Comparaison du mot de passe en BDD et dans le formulaire
            if ($user == password_verify($_POST['password_users'], $user['password_users'])) {
                echo "Identifiant valid!";
                echo "<p>Bievenue" . $user['first_name'] . "</p>";
            } else {
                echo "Identifiant invalid!";
            }
            */
            //	while ($donnees = $req->fetch())
            //{
            //
            //}
            $email_users = $_POST['email_users'];
            //$_SESSION["password_users"] = password_hash($_POST['password_users'], PASSWORD_DEFAULT);;
            // Si $_Session est set
            //Ne rien faire1
            //Sinon
            // si POST set
            //requête de login
            //stockage variable
            //Proposé connexion
            //Proposé inscription
        } else {
    ?>
            <!-- Formulaire de connexion -->
            <h1>Page de login</h1>
            <table class="table-login">
                <form method="post" action="login.php" class="form-login">
                    <li><label for="email_users">Email: </label> : <input type="text" id="email_users" name="email_users"></li>
                    <li><label for="password_users">Mot de passe: </label> : <input type="password" id="password_users" name="password_users"></li>
                    <li><label for="forget_password">Mot de passe oublier</label><input type="checkbox"></li>
                    <input type="submit" value="Connexion" name="login" /><input type="reset" value="Effacer" />
                </form class="form-login">
            </table class="table-login">
    <?php
        }
    }
    ?>
    <li><a href="logout.php">Déconnexion</a></li>
    </ul>
</body>

</html>