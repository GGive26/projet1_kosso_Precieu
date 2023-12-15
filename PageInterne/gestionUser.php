<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionUsers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<?php  
 require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
session_start();
$users=getAllUsers();
if(isset($_SESSION['auth'])){
$userconnected=getUserById($_SESSION['auth']['id']);
$userbyName=getUserByUsername($userconnected['user_name']);
        
  ?>
<body class="acceuilAdmin">
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
             <a class="nav-link" href="AcceuilAdmin.php">Accueil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="profil.php">Profil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="panier.php">Paniers</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">gestionUsers</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="gestionProduct.php">gestionProduct</a>
         </li>
     </ul>
 </div>
</nav>
    <h1>gestionUsers</h1>
<form action="./editUsers.php" method="post" class="form">
    <fieldset><legend>Gestion des Produits</legend>
    <select name="user_name">
        <?php
                foreach($users as $user=> $name){
        ?>
        <option><?php
                echo $name['user_name'];
        ?>
        </option>
        <?php
        }
        ?>
        <br>
    
    </select>
    <?php if($_SESSION['auth']['role_id']==1){?>
    <select name="role_id">
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>
    <?php }else{
        ?> <select name="role_id">
        <option>2</option>
        <option>3</option>
    </select>
    <?php
    }
    ?>
    <p>NB:le 1 est pour SuperAdmin , 2 Admin et 3 client</p>

    <input type="submit" value="Changer">
    </fieldset>
</form>
<?php
}
?>
    <br><br>
    <form class="form" action="./deleteUsers.php" method="post">

    <fieldset>
        <legend>Suppression des Users</legend>
    <label for="user_name">le Nom du Users</label>
    <input type="text" id="name" name="user_name"><br>

    <input type="submit" value="Supprimer">

</fieldset>
    </form>
</body>
</html>