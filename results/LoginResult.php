<html>
    <head>
    <title>Acceuil Utulisateur</title>
    <link rel="stylesheet" href="../styles/style.css">
    </head>

<a href="../">Accueil</a>
<h2>Login result</h2>
<body class="ResultLog">
<nav>
  <ul>
    <li><a href="../index.php">Accueil</a></li>
    <li><a href="../pages/SignUpClient.php">À propos</a></li>
    <li><a href="../PageInterne/profil.php">Profil Users</a></li>
  </ul>
</nav>
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
    };

    
    if ($userData) {
        $enteredPwdEncoded = encodePwd($_POST['pwd']);

        if ($userData['pwd'] == $enteredPwdEncoded) {
            //traitement si mdp correct
            echo"<p>Votre mot de passe est correct</p><br><br>";
            $token = hash('sha256', random_bytes(32));
           
            //enregistrer le token en Session 
            $_SESSION['auth']=[
                'token'=> $token,
                'id'=>$userData['id'],
                'role-id'=>$userData['role_id']
            ];

            //envoie a la db
            $data=[
                'user_name'=>$_POST['user_name'],
                'token'=>$_SESSION['token']
            ];
            updateToken($data);

            echo "C'est le bon mdp ";
        }else {
            //traitement si mdp incorrect
            echo"<p><b>Votre mot de passe est incorrect</b></p><br><br>";
              }
    }else{
        //redirect vers login
    echo"<p>Votre Identifiiant n'es pas reconnue</p>";
    $url = '../pages/loginClient.php';
    header('Location: ' . $url);
    }
} 

?>







</body>