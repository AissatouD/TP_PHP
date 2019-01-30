<?php
session_start()
/**
 * Created by IntelliJ IDEA.
 * User: AissatouDiop
 * Date: 1/29/19
 * Time: 11:16
 */

// Connexion à la base de donnée
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

// Requete pour afficher l'article dans son intégralité
$query= 'SELECT title, content, author_id  FROM articles WHERE id= :id';
$statement= $pdo->prepare($query);
$id= strip_tags($_GET['id']);
$statement->execute([':id' => $id]);
$article= $statement->fetchAll(PDO::FETCH_ASSOC);

// dans le cas où l'article n'existe pas
if($article=== false){
    http_response_code(404);
    die;

}

?>
 <!-- Affichage de l'article dans son l'intégralité -->
<h1><?php echo $article['title']; ?></h1>
<p><?php echo $article['content']; ?></p>
<p><?php echo  'Par '.'  '.$article['author_id']; ?></p>
