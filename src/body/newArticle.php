<?php
session_start();

include '../header/header.php';
//on se connecte à la base de donnée
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');


if(isset($_GET['newArticleButton'])) {
    $title = strip_tags($_GET['title']);
    $content = strip_tags($_GET['content']);
    $author_id = $_SESSION['id'];

    if (isset($title) && isset($content)) {
        $query = 'INSERT INTO articles(title, content, author_id)
              VALUES(:title, :content, :author_id)'; //requête préparée

        $statement = $pdo->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':author', $author);
        $status = $statement->execute();

    }
    $success = 'Vous pouvez dès à présent consulter votre article !';


}


// supprimer un article

$ID = $_GET['id'];
$requete = "DELETE FROM articles WHERE id ='$ID'";
echo "Votre article a été supprimé ! ";
$statement = $pdo->prepare($requete);
$statement->execute();

?>

<form class="" method="get" action="">

<div class="col-md 6">
    <div class="form-group purple-border">
        <label for="inputPassword4">Titre</label>
        <textarea class="form-control" id="exampleFormControlTextarea4" rows="2" name="titleArticle"></textarea>
    </div>
</div>



<div class="col-md 6">
    <div class="form-group purple-border">
        <label for="exampleFormControlTextarea4">Contenu</label>
        <textarea class="form-control" id="exampleFormControlTextarea4" rows="10" name="textArticle"></textarea>
    </div>
</div>

<a href="" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" name="newArticleButton">Publier</a>


</form>

