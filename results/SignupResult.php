<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <title>ValidationEnregistrement</title>
</head>
<body class="LoginResult">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
 <a class="navbar-brand" href="#">Librairie Soleil</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
         <li class="nav-item active">
             <a class="nav-link" href="../index.php">Accueil<span class="sr-only">(current)</span></a>
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
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
session_start();
if (isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);

    $fieldValidation = true;
    // valid user name
    if (isset($_POST['user_name'])) {
        $nameIsValidData = usernameIsValid($_POST['user_name']);

        if ($nameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    if (isset($_POST['lname'])) {
        $lnameIsValidData = lastnameIsValid($_POST['lname']);

        if ($lnameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    if (isset($_POST['fname'])) {
        $fnameIsValidData = firstnameIsValid($_POST['fname']);

        if ($fnameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    //valid email
    if (isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if ($emailIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    // valid mdp
    if (isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if ($pwdIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    if ($fieldValidation == true) {
        //envoyer à la DB

        $encodedPwd = encodePwd($_POST['pwd']);
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' =>encodePwd($_POST['pwd']),
            'lname'=>$_POST['lname'],
            'fname'=>$_POST['fname'],
        ];
         createUser($data);
         $_SESSION['auth']=[
            'user_name'=>$data['user_name'],
            'pwd'=>$data['pwd'],
         ];
         $info=getUserByUsername($data['user_name']);
         upUserId($info['id']);
         $url = '../pages/LoginClient.php';
         header('Location: ' . $url);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg'],
            'fname'=>$lnameIsValidData['msg'],
            'lname'=>$fnameIsValidData['msg']
        ];
        $url = '../pages/SignUpClient.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../pages/SignUpClient.php';
    header('Location: ' . $url);
}

?>
</body>
</html>