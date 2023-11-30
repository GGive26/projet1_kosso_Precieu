<a href="../">Accueil</a>
<h2>Login result</h2>
<?php
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';

var_dump($_POST);

//Authentification

if (isset($_POST)) {

    //vérifier si username dans DB
    if (!empty($_POST['user_name'])) {
        $userData = getUserByUsername($_POST['user_name']);
    } else {
        //Erreur rien e
        echo"<p>Veuillez remplir la case Identifiant avec votre Nom d'utulisateur</p><br><br>";
        //redirect vers login
        $url = '../pages/loginClient.php';
        header('Location: ' . $url);
    }

    
    //si l'utilisateur exist dans la DB
    if ($userData) {
        // comparer pwd avec DB (version encodée)
        $enteredPwdEncoded = encodePwd($_POST['pwd']);
        var_dump("(1)  ".$userData['pwd']);
        echo"<br><br>";
        var_dump("(2)  ".$enteredPwdEncoded);

        if ($userData['pwd'] == $enteredPwdEncoded) {
            //traitement si mdp correct
            echo"<p>Votre mot de passe est correct</p><br><br>";
            //créeer un token
            $token = hash('sha256', random_bytes(32));
            echo '</br></br>Mon token : </br>';
            
            var_dump($token);
            //enregistrer le token en Session 
            $_SESSION['token']=$token;

            //envoie a la db
            $data=[
                'user_name'=>$_POST['user_name'],
                'token'=>$token
            ];
            updateToken($data);

            echo "C'est le bon mdp ";
        }else {
            //traitement si mdp incorrect
            echo"<p>Votre mot de passe est incorrect</p><br><br>";
            //compter lenombre d'erreur et bloquer l'IP apres 3 erreur
            //Les erreurs peuvent etre dans une Session
            //Proposer de réinitialiser le mdp
            //Créer un msg d'erreur
            //renvoyer sur la page login
            echo "C'est pas le bon mdp ";        }
    }
} else {
    //redirect vers login
    $url = '../pages/login.php';
    header('Location: ' . $url);
}










?>