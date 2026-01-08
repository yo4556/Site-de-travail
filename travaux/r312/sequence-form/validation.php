<?php

$erreurs = [];

$prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
$email  = isset($_POST['email']) ? trim($_POST['email']) : '';

if (empty($prenom)) {
    $erreurs['prenom'] = 'Prénom requis';
} elseif (!preg_match('/^[a-zA-ZÀ-ÿ]{3,15}$/', $prenom)) {
    $erreurs['prenom'] = 'Le prénom doit contenir entre 3 et 15 lettres uniquement';
}

if (empty($email)) {
    $erreurs['email'] = 'Email requis';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs['email'] = 'Adresse email invalide';
}

if (!empty($erreurs)) {
    echo json_encode($erreurs);
} else {
    echo json_encode(true);
}
