<?php


//composer require firebase/php-jwt

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Vérification de l'adresse email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Adresse email non valide
    $response = array('error' => 'Adresse email non valide');
    echo json_encode($response);
    exit;
}

// Vérification des informations d'identification avec la base de données ou un systeme d'authentification
// ...

// Si les informations sont valides, génération du JWT
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;

$secret_key = "xavier";
$issuer_claim = "your_website";
$audience_claim = "your_audience";

$issuedat_claim = time(); // issued at
$notbefore_claim = $issuedat_claim + 10; //not before in seconds
$expire_claim = $issuedat_claim + 60; // expire time in seconds


$token = array(
    "pseudo" => "xav03",
    "admin" => false
);

$jwt = JWT::encode($token, $secret_key, 'HS256');


// Réponse à envoyer au client
$response = array('token' => $jwt);
echo json_encode($response);