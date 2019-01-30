<?php
session_start();

require_once '../header/header.php';
require_once 'traitement_inscription.php';

?>

<body>

<h1>Connectez-vous à votre espace membre</h1>

<form id="inscription" method="post" action="traitement_inscription.php">
    <div class="container">
        <div class="col-md-6">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="sessionMail" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="sessionPassword" placeholder="Mot de passe">
        </div>
    </div>

    <div class="form-group row">

            <button type="submit" class="btn btn-primary" name="formConnexion">Se connecter</button>
        </div>
    </div>
     </div>
    </div>
</form>



</body>
</html>












