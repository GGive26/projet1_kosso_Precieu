<html>
    <head>
    <title>Acceuil Utulisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    </head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
 <a class="navbar-brand" href="#">CrazySimpson</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
         <li class="nav-item active">
             <a class="nav-link" href="../index.php">Accueil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="../PageInterne/profil.php">Profil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="../PageInterne/panier.php">Paniers</a>
         </li>
     </ul>
 </div>
</nav>
<?php
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';

session_start();

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
            echo"<h2>Salut  ".$_POST['user_name']."</h2><br>";
            $token = hash('sha256', random_bytes(32));
           
            //enregistrer le token en Session 
            $_SESSION['auth']=[
                'token'=> $token,
                'id'=>$userData['id'],
                'role_id'=>$userData['role_id']
            ];

            //envoie a la db
            $data=[
                'user_name'=>$_POST['user_name'],
                'token'=>$_SESSION['auth']['token']
            ];
            updateToken($data);

            echo"<h5> Appuie sur le boutton Acceuil afin d'entrer dans le site ,Bye</h5>";
            if($_SESSION['auth']['role_id']==3){
            echo"<a class='btn btn-success' href='../PageInterne/AcceuilClient.php' >Click</a>";
            }
            else{
                echo"<a class='btn btn-success' href='../PageInterne/AcceuilAdmin.php'>Click</a>";
            }
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