<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=mmi24c04;charset=utf8', 'mmi24c04', '22402538' ,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$monPseudo = $_GET['mon_pseudo'] ?? '';

$requetemessages = $mysqlClient->prepare("SELECT * FROM chat ORDER BY id DESC LIMIT 10");
$requetemessages->execute();

$messages = array_reverse($requetemessages->fetchAll(PDO::FETCH_ASSOC));

foreach ($messages as $message) {
    $classe = ($message['pseudo'] === $monPseudo) ? 'me' : 'others';
    
    $heureAffichage = date('H:i', strtotime($message['time']));

    echo "<div class='msg " . htmlspecialchars($classe) . "'>";
    echo "<b>" . htmlspecialchars($message['pseudo']) . "</b> ";
    echo "<span style='font-size: 0.8em; color: #888;'> à " . $heureAffichage . "</span><br>";
    echo htmlspecialchars($message['message']);
    echo "</div>";
}
?>
