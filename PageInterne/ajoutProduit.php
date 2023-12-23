<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="gestionUser.php">gestionUsers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">gestionProduct</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    //Page d'ajout des produits
    require_once '../functions/userCrud.php';
    require_once '../functions/functions.php';
    require_once '../utils/connexion.php';

    session_start();
    if (isset($_POST)) {

        //vérifier si username dans DB
        if (!empty($_POST['name'])) {
            $productData = getProduct($_POST['name']);
        } else {
            //Erreur rien e
            echo "<p>Veuillez remplir la case des produits</p><br><br>";
            //redirect vers login
            $url = './gestionProduct.php';
            header('Location: ' . $url);
        };


        if ($productData == false) {

            echo "<h1>Ce produit existe deja</h1>";
        } else {
            $data = [
                'name' => $_POST['name'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'img_url' => $_POST['img_url'],
                'description' => $_POST['description']
            ];
            createProduct($data);
            //traitement si mdp incorrect
            echo "<p><b>Votre produit a ete enregistrer </b></p><br><br>";
            $url = './AcceuilAdmin.php';
            header('Location: ' . $url);
        }
    }
    ?>
</body>

</html>