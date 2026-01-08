<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=mmi24c04;charset=utf8', 'mmi24c04', '22402538');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->GETMessage());
}

if (isset($_GET['pseudo']) && isset($_GET['message'])) {
    $sqlQuery = 'INSERT INTO chat (pseudo, message) VALUES (:pseudo, :message)';
    $insertStatement = $mysqlClient->prepare($sqlQuery);

    $insertStatement->execute([
        'pseudo' => $_GET['pseudo'],
        'message' => $_GET['message'],
    ]);

    $message_feedback = "Message envoyé ! ";
}
?>