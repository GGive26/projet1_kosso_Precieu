<?php
session_start();
//Page d'affichage d'un Paiement Reussi
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body style="
background-image: url(../styles/images/c0t42gdb.png);
text-align:center;color:green;
">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/logoP.png" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <?php
                    if ($_SESSION["auth"]["role_id"] > 3) {
                    ?>
                        <a class="nav-link" href="AcceuilAdmin.php">Accueil</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link" href="AcceuilAdmin.php">Accueil</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <h5>Votre Achat as ete effectuer avec Succes Bonne journee</h5>

</body>

</html>