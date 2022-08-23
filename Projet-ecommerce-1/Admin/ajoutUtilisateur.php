<?php
   //Variables de tests
    //$_POST['nom_artiste']="Sirkis";
    //$_POST['prenom_artiste']="Nicola";
    $config_bdd = "../include/connect.php";
    //Conditionnement (nom artiste ou prenom artiste) et code artiste pas vide, on continue
    if (isset($_POST['signup'])) {
        $password_hash = password_hash($_POST['signup_password_users'], PASSWORD_DEFAULT);
        try {
            //J'ai besoin de la Base de Donnée
            //Vérification complexité mot de passe
            require $config_bdd;
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
            header("location:../index.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }