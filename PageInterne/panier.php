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
                    echo"<a class='nav-link' href='AcceuilClient.php'>Accueil</a>";
                }
            }
             ?>
         <li class="nav-item">
             <a class="nav-link" href="../PageInterne/profil.php">Profil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">Paniers</a>
         </li>
     </ul>
 </div>
</nav>
            <center><h1>Veuillez Entrez votre Adresse et clicker sur achat afin de finaliser sur Paypal</h1></center>
            
            <form action="./End.php" method="post">
   <fieldset>
    <div class="container">
    <div>
        <label for="street_name">Nom de rue : </label>
        <input id="street_name" type="text" name="street_name" >
        
    </div>
    <div>
        <label for="street_nb">Numero de Rue  : </label>
        <input id="street_nb" type="text" name="street_nb" >
        
    </div>

    <div>
    <label for="city">City : </label>
    <input id="city" type="text" name="city" >
   
    </div>
    <div>
    <label for="province">Province : </label>
    <input id="province" type="text" name="province" >
    
    </div>
    <div>
    <label for="zip_code">Code Postal : </label>
    <input id="zip_code" type="text" name="zip_code" >
    </div>

    <div>
    <label for="country">Country : </label>
    <input id="country" type="text" name="country"  ?>">
    </div>
    </div>
        </fieldset>
   <center> <input type="submit" value="Acheter"></center>
  </form>    
</body>
</html>