<?php

//on se connecte à la base de donnée
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

// on vérifie que le formlaire a bien été soumis
if (isset($_POST['formInscription'])){

    // on sécurise les données du formulaire
    $pseudo= htmlspecialchars($_POST['uPseudo']);
    $email= htmlspecialchars($_POST['uEmail']);
    $confEmail= htmlspecialchars($_POST['uConfEmail']);

    // on hash le mot de passe
    $password = password_hash($_POST['uPassword'], PASSWORD_DEFAULT);
    $confPassword = $password;


    //On vérifie  que les champs ne sont pas vide
    if(!empty($_POST['uPseudo']) && ($_POST['uEmail']) && ($_POST['uConfEmail']) && ($_POST['uPassword'])){


        //on vérifie la longueur autorisé du pseudo
        $pseudolength= strlen($pseudo);
        if ($pseudolength <= 255){

            // on vérifie que les 2 mails sont identiques
            if($email === $confEmail){

                // on vérifie que le mail n'existe pas déjà dans la BDD
                $reqmail= $pdo->prepare("SELECT * FROM blog_user WHERE email= ? ");
                $reqmail->execute(array($email));
                $mailexist= $reqmail->rowCount();

                if($mailexist==0){

                    // on vérifie que les 2 mots de passe sont identiques
                    if($password === $confPassword){

                        // on insert dans la BDD les données de l'utilisateur
                        $query= $pdo->prepare("INSERT INTO blog_user(pseudo, password, email) VALUES(?, ?, ?)");
                        $query->execute(array($pseudo, $password, $email));
                        $error= "Votre compte à bien été créé";
                        header('location: espacePerso.php');


                    }// fin insertion
                }// fin vérif mail existe



                else {
                    $error= "Vos mots de passe doivent être identiques";
                } // fin if mot de passe

            }
            else {
                $error= "Vos adresses mail doivent être identiques";
            } // fin if email

        }
        else {

            $error = "Votre pseudo ne doit pas dépasser 255 caractères";
        } // fin if pseudo


    }
    else {
        // message d'erreur si les champs du formulaire sont vides
        $error= 'Tous les champs doivent être complétés.';
    }
}

if (isset($error)){
    echo $error;
}

// TRAITEMENT CONNEXION




 // vérifier que le formilaire a bien été soumis
if (isset($_POST['formConnexion'])) {

    // sécuriser les données du formulaire
    $sessionMail = htmlspecialchars($_POST['sessionMail']);

    // vérifier que les champs ne sont pas vides
    if (!empty($sessionMail) AND !empty($sessionPassword)) {

// on récupére les données de l'utilisateur
        $query = $pdo->prepare('SELECT * FROM blog_user WHERE email = :email');
        $query->execute(array(
            'email' => $_POST['sessionMail']));
        $resultat = $query->fetch();


//on compare le mot de hash du mot de passe de la BDD avec celui du formulaire
        $isPasswordCorrect = password_verify($_POST['sessionPassword'], $resultat['password']);

        //on génère un message d'erreur si la requête n'a pas fonctionné
        if (!$resultat) {
            echo 'ERR requete!';
        } else {

            // on definie les valeurs  les variables de session
            if ($isPasswordCorrect) {
                $_SESSION['email'] = $_POST['sessionMail'];
                $_SESSION['name'] = $resultat['pseudo'];
                $_SESSION['connected'] = TRUE;


                // on redirige vers l'espace personne du user
                header('Location:espacePerso.php');
                echo 'Bonjour' . ' ' . $_SESSION['name'];
            } else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
    else {
        // message d'erreur si les champs du formulaire sont vides
        $error= 'Tous les champs doivent être complétés.';
    }

}
