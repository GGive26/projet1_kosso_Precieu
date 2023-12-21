<html>
    <head>
    <title>Modification Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    </head>
<body class="LoginResult">
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

     </ul>
 </div>
</nav>
<?php
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';

session_start();



if (isset($_POST)) {

    
    if(isset($_SESSION)){
        $userData = getUserByUsername($_POST['user_name']);
    
    if ($userData) {
           
           $data=[
           'user_name'=>$_POST['user_name'],
           'role_id'=>$_POST['role_id']
           ];
           $updateRole=updateRoleId($data);
           $url = './AcceuilAdmin.php';
           header('Location: ' . $url);
           
        }

    }
} 

?>


</body>