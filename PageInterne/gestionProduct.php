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
             <a class="nav-link" href="gestionUser.php">gestionUsers</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">gestionProduct</a>
         </li>
     </ul>
 </div>
</nav>
    <h1>GestionProduit</h1>

    <form method="post" action="./ajoutProduit.php" class="form">
        <fieldset>
            <legend>Ajout des produits</legend>
    <div>
        <label for="name">Nom du produit</label>
        <input id="name" type="text" name="name" " >
    </div>
    <div>
        <label for="quantity">quantity  : </label>
        <input id="quantity" type="number" name="quantity"  >
    </div>
    <div>
        <label for="price">Prix : </label>
        <input id="price" type="number" name="price" >
    </div>
    <div>
        <label for="images">Images</label>
    <select name="img_url" id="images">
        <option><a href="../styles/images/index.webp">Les simpsons</a></option>
        <option><a href="../styles/images/demonSlayer.jpg">Demon Slayer</a></option>
        <option><a href="../styles/images/detectiveConan.jpg">Detective conan</a></option>
        <option><a href="../styles/images/kingdom.jpg">Kingdom</a></option>
    </select>

    </div>
    <div>
    <label for="description">Description</label>
    <input id="description" type="text" name="description" >
 
    </div>
        </fieldset>
    <input type="submit" value="Ajout">
    </form>
</body>
</html>