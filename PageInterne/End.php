<?php
session_start();
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
$mesProduits = afficherProduit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcceuilClient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="acceuilClient">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

            </ul>
        </div>
    </nav>

    <center>
        <h4>Vous avez Completer les etapes essentielle Finaliser le Paiement en clickant sur le boutton en dessous </h4>
    </center>

    <?php
    $data = [
        'street_name' => $_POST["street_name"],
        'street_nb' => $_POST["street_nb"],
        'city' => $_POST["city"],
        'province' => $_POST["province"],
        'zip_code' => $_POST["zip_code"],
        'country' => $_POST["country"],
    ];
    //creation de l'addresse 
    createAdresse($data);
    //creation d'un boutton envoyant vers un fake-Paypal
    ?>
    <center><a href="Paiement-Succed.php"><button>Paypal</button></a></center>
</body>

</html>