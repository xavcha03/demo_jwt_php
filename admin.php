<?php
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "xavier";

//Récupération du token
$headers = getallheaders();
$jwt = str_replace("Bearer ","" ,$headers['Authorization']);




try{
    $decoded = JWT::decode($jwt, new Key($secret_key , 'HS256'));
    if($decoded->admin === true){
        echo "Welcome Admin !";
    }else{
        echo "your are not an admin";
    }
} catch(\Exception $e){
    echo 'invalid token';
}