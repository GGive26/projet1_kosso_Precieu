<?php
session_start();
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
$mesProduits=afficherProduit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcceuilAdmin</title>
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
             <a class="nav-link" href="#">Accueil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="../PageInterne/profil.php">Profil</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="../PageInterne/panier.php">Paniers</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="gestionUser.php">gestionUsers</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="gestionProduct.php">gestionProduct</a>
         </li>
     </ul>
 </div>
</nav>
<center><h3>Bienvenue dans notre Site dedié aux Otakus</h3></center>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php  foreach($mesProduits as $produit){ ?>
            <div class="col">
              <div class="card shadow-sm" style="width: 18rem;">
                <img src="<?php echo $produit["img_url"] ?>"  name="img_url" value="<?php echo $produit['name'] ?>" class="card-img-top" alt="...">
                <text x="50%" y="50%" fill="#eceeef" dy=".3em" name="quantity" value="<?php echo $produit['quantity'] ?>"> <H3><?php echo $produit['quantity'] ?></H3></text>
                <div class="card-body">
                  <p class="card-text"  name="name" value="<?php echo $produit['name'] ?>"><b><?php echo $produit["name"] ?></b> </p>
                  <p class="card-text"  name="description" value="<?php echo $produit['description'] ?>"><?php echo $produit["description"] ?> </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <small class="text-body-secondary"  name="price" value="<?php echo $produit['price'] ?>"><?php echo $produit["price"] ?> $CAD</small><br>
                      <form method="post" action="./DetailsCommande.php" >
                  <label for="quantity"> la quantite : </label>
                  <input type="number" name="quantity" value="">
                  <?php
                  ?>
                  <input type="number" name="product_id" value="<?php echo intval($produit['id']) ?>" hidden> 
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">acheter</button> -->
                  <button type="submit" class="btn btn-primary">Acheter</button>
                </form>
                </div>
                <?php
                
                $_SESSION["product_id"]=$produit["id"];
                $_SESSION["price"]=$produit["price"];
                ?>
              </div>
            </div>
          </div>
        </div>
<?php }?>
    </div>
    </div>
</div>

</body>
</html>