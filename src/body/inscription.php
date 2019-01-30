<?php
session_start();
require_once '../header/header.php';
?>

<h3> INSCRIPTION</h3>
<form  method="post" action="traitement_inscription.php">
    <div class="form-row col-md-6">

        <div class="form-group col-md-6">
            <label for="inputPassword4">Pseudo</label>
            <input type="text" class="form-control" id="uPseudo" name="uPseudo" value="<? if(isset($pseudo)) {echo $pseudo;} ?>">
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress">Email</label>
        <input type="text" class="form-control" id="uEmail" name="uEmail" value="<? if(isset($email)) {echo $email;} ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress2">Confirmation du mail</label>
        <input type="text" class="form-control" id="uConfEmail" name="uConfEmail" value="<? if(isset($confEmail)) {echo $confEmail;} ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress2">Mot de passe</label>
        <input type="password" class="form-control" id="uPassword" name="uPassword">
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress2">Confirmation du mot de passe</label>
        <input type="password" class="form-control" id="confPassword" name="confPassword">
    </div>

    <button type="submit" name="formInscription" class="btn btn-primary">Valider</button>
</form>

<?php

include '../footer/footer.php';

?>