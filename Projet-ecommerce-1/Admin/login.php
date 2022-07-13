<?php
// Start the session
session_start(); ?>
<!DOCTYPE html>
<html>

<body>
    <?php
    $config_bdd="../SQL/connectionBDD.php";
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
        isset($_SESSION['email_users']) and isset($_SESSION['password_users'])
    ) {
        //Utilisateur déjà connecter, ne doit pas se trouvé ici.
        header('Location: ../index.php');
        // Les actions suivantes sont "normalement" inutile grâce au header
        //echo "Vous êtes déjà connecter";
        //echo "<a href=\"logout.php\">Déconnexion</a>";
    } else {
        //Formulaire de connexion est remplis
        if (isset($_POST['login'])) {
            //Si les champs email et mdp ne sont aps vide
            if(empty($_POST['email_users']) || empty($_POST['password_users'])){
                echo "Both field are required";
            }
            else{
            //J'ai besoin de la Base de Donnée
            require $config_bdd;
            $stmt = $bdd->prepare("SELECT * FROM customers WHERE email = ?");
            $email_users_post=[$_POST['email_users']];
            $stmt->execute([$_POST['email_users']]);
            $user = $stmt->fetch();//fetchAll(PDO::FETCH_ASSOC);//
            var_dump($user);
            //Vérification si le mot de passe du formulaire est identique à celui en BDD
            if ($user && password_verify($_POST['password_users'], $user['password']))
                {
                    echo "Identifiants Valide !</br>";
                    $_SESSION['prenom']=$user['first_name'];
                    $_SESSION['nom']=$user['last_name'];
                    echo $_SESSION['prenom'];
                    echo $_SESSION['nom'];
                    header("location:../index.php");
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
                $req = $bdd->prepare('INSERT INTO customers (first_name , last_name, email, password, gender ) VALUES (:first_name, :last_name, :email, :password_hash, :gender)');
                $data = [
                    'first_name' => $_POST['signup_first_name'],
                    'last_name' => $_POST['signup_last_name'],
                    'email' => $_POST['signup_email_users'],
                    'gender' => $_POST['signup_gender'],
                    'password_hash' => $password_hash,
                ];
                $req->execute($data);
                header("location:login.php");
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
                <form method="post" action="login.php" class="form-login">
                    <li><label for="email_users">Email: </label> : <input type="text" id="email_users" name="email_users"></li>
                    <li><label for="password_users">Mot de passe: </label> : <input type="password" id="password_users" name="password_users"></li>
                    <li><label for="forget_password">Mot de passe oublier</label><input type="checkbox"></li>
                    <input type="submit" name="login" value="Connexion" /><input type="reset" value="Effacer" />
                </form class="form-login">
            </table class="table-login">
            <form method="post"  action="login.php" >
            <input type="submit" name="Sinscrire" value="Sinscrire">
            </form>
            <?php }
        }
        //Si le bouton "Sinscrire" est cliquer, affiché le fomulaire d'incription et masque celui de connexion
        if (isset($_POST['Sinscrire'])) { ?>
        <h1>Inscription</h1>
        <table class="table-signup">
            <form method="post" action="login.php" class="form-login">
                <li><label for="signup_first_name">Prénom: </label> : <input type="text" id="signup_first_name" name="signup_first_name"></li>
                <li><label for="signup_last_name">Nom: </label> : <input type="text" id="signup_last_name" name="signup_last_name"></li>
                <li><label for="signup_email_users">Email: </label> : <input type="text" id="signup_email_users" name="signup_email_users"></li>
                <li><label for="signup_gender ">Sexe: </label> : <input type="text" id="signup_gender " name="signup_gender"></li>
                <li><label for="signup_password_users">Mot de passe: </label> : <input type="password" id="signup_password_users" name="signup_password_users"></li>
                <li><label for="signup_confirm_password_users">Confirmer le mot de passe: </label> : <input type="password" id="confirm_password_users" name="confirm_password_users"></li>
                <input type="submit" name="signup" value="Inscription" /><input type="reset" value="Effacer"/>
            </form class="form-signup">
        </table class="table-signup">
        <?php }
    } ?>
    <h1>Je suis là car on à besoin de moi:</1>
    <li><a href="logout.php">Déconnexion</a></li>
</ul>
</body>
</html>