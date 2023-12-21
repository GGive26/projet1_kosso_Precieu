<?php
session_start();
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
$idProduct=getProductById(intval($_POST["product_id"]));

$price=intval($idProduct["price"]);

$quantity=intval($_POST["quantity"]);

$priceT=intval($price*$quantity);

$id_client=intval($_SESSION["auth"]["id"]);
$data1=[
    'date'=>date('Y-m-d H:i:s'),
    'total'=>$priceT,
    'user_id'=>$id_client
];
//$monAchatUser=createUserOrderProduct($data1);
$recIdUserProduct=getUserOrderById($id_client);
var_dump($recIdUserProduct["id"]);

$data=[
    'order_id'=>$recIdUserProduct["id"],
    'product_id'=>$_POST["product_id"],
    'quantity'=>$_POST["quantity"],
    'price'=>$priceT
];
$monPanier=createOrderProduct($data);
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
            <?php
            if($_SESSION["auth"]["role_id"]>1){
                ?>
             <a class="nav-link" href="./AcceuilAdmin.php">Accueil</a>
             <?php
            }else{
                ?>
                <a class="nav-link" href="./AcceuilClient.php">Accueil</a>
                <?php    
            }
            ?>
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

<table border="5" class="form" >
        <thead>
            <tr>
                <th style="border: 4px solid red; padding: 8px;" >Nom Du Produit</th>
                <th style="border: 4px solid red; padding: 8px;" >Quantite de Produit</th>
                <th style="border: 4px solid red; padding: 8px;" >Prix Totale</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($idProduct)) {
                    echo "<tr >";
                    echo "<td style='border: 4px solid red; padding: 8px;' >" . $idProduct["name"] . "</td>";
                    echo "<td style='border: 4px solid red; padding: 8px;' >" . $quantity . "</td>";
                    echo "<td style='border: 4px solid red; padding: 8px;' >" . $priceT . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
            </table>
            <a href="./panier.php"><input type="button" value="Confirmer"></a><br><br>
            <?php
            if($_SESSION["auth"]["role_id"]>3){
                ?>
            <a href="./AcceuilAdmin.php"><input type="button" value="Annuler"></a>
        <?php    
        }else{
?>
                <a href="./AcceuilClient.php"><input type="button" value="Annuler"></a>
            <?php
            }
            ?>
</body>
</html>
