<?php
session_start();

include '../header/header.php';
?>

<h2> Liste des articles</h2>

<?php

// Connexion à la base de donnée
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

// Afficher la liste des articles
$page = 'compte';

//Si le membre n'est pas conecte on le redirige
if (!$_SESSION['connected'] == TRUE) {
    header("Location: connexion.php");
}

// Recuperer les infos du membre connecte
if (isset($_SESSION['username'])) {
    $requser = $pdo->prepare('SELECT * FROM blog_user WHERE pseudo = ?');
    $requser->execute(array('pseudo'));
    $userinfo = $requser->fetch();
}

//Recuperer les dernieres annonces du user
$stmt = $pdo->prepare("SELECT  id, title, content FROM articles WHERE author_id = :author_id ");
$stmt->execute([':author_id' => $_SESSION['name']]);
?>

</body>

</html>

