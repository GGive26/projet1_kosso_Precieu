<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionProduit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="acceuilClient">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
 <a class="navbar-brand" href="#">CrazySimpson</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
            <?php
            session_start();
            if(isset($_SESSION)){
                if($_SESSION['auth']['role_id']<3){
             echo"<li class='nav-item active'>
             <a class='nav-link' href='AcceuilAdmin.php'>Accueil</a>
             </li>";
             echo"<li class='nav-item active'>
             <a class='nav-link' href='gestionUser.php'>gestionUser</a>
             </li>";
             echo"<li class='nav-item active'>
             <a class='nav-link' href='gestionProduct.php'>gestionProduct</a>
             </li>";
                }else{
                    echo"<li class='nav-item active'>
                    <a class='nav-link' href='AcceuilClient.php'>Accueil</a>
                    </li>";
                }
            }
             ?>
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
$users=getAllUsers();
if(isset($_SESSION['auth'])){
$userconnected=getUserById($_SESSION['auth']['id']);
$userbyName=getUserByUsername($userconnected['user_name']);
   ?> 
   <form action="./editProfil.php" method="post">
   <fieldset>
            <h1><center><legend>Modification Du Profil <?php echo "<h1>".$userconnected['user_name']."</h1>";?></legend></center></h1>
    <div class="container">
    <div>
        <label for="lname">Nom  : </label>
        <input id="lname" type="text" name="lname" value="<?php echo $userbyName['lname'] ?>">
        <p class="error"><?php echo isset($_SESSION['signup_errors']['lname'])? $_SESSION['signup_errors']['lname'] : '' ?></p>
    </div>
    <div>
        <label for="fname">Prenom : </label>
        <input id="fname" type="text" name="fname" value="<?php echo $userbyName['fname'] ?>">
        <p class="error"><?php echo isset($_SESSION['signup_errors']['fname'])? $_SESSION['signup_errors']['fname'] : '' ?></p>
    </div>

    <div>
    <label for="email">Courriel</label>
    <input id="email" type="text" name="email" value="<?php echo $userbyName['email'] ?>">
    <p class="error"><?php echo isset($_SESSION['signup_errors']['email'])? $_SESSION['signup_errors']['email'] : '' ?></p>

    </div>
    </div>
        </fieldset>
   <center> <input type="submit" value="Modifier"></center>
  </form>
  <?php
}
  ?>
</body>
</html>