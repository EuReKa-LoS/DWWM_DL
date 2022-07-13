<?php
/*
$_POST['signup_first_name'] = 'admin';
$_POST['signup_last_name'] = 'admin';
$_POST['signup_email_users'] = 'admin@example.com';
$_POST['signup_gender'] = 'admin';*/
$password_hash = password_hash($_POST['signup_password_users'], PASSWORD_DEFAULT);
try {
    //Variables de tests
    //$_POST['nom_artiste']="Sirkis";
    //$_POST['prenom_artiste']="Nicola";
    require '../SQL/connectionBDD.php';
    //Conditionnement (nom artiste ou prenom artiste) et code artiste pas vide, on continue
    
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
