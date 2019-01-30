<?php
session_start();
include '../header/header.php';
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');



if (isset($_GET['id']) && $_GET['id'] >0){

    // on sécurise l'id qu'on récupère
    $getId= intval($_GET['id']);

    // on recupére les information du user grâce à l'id
    $reqUser= $pdo->prepare('SELECT * FROM blog_user WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo= $reqUser->fetch();

    // on affiche un bonjour personnalisé
    echo 'Bonjour'.' '.$userInfo['pseudo'];



}

?>

<body>
<div>
<a href="newArticle.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Publier un article</a>
<a href="articles.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Mes articles</a>
</div>






