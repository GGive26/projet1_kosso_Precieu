<html>

<head>
    <title>Acceuil Utulisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="LoginResult">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    //page pour modification de Profil User
    require_once '../functions/userCrud.php';
    require_once '../functions/functions.php';
    require_once '../utils/connexion.php';

    session_start();

    //Authentification

    if (isset($_POST)) {

        //vérifier si username dans DB
        if (isset($_SESSION)) {
            $userData = getUserById($_SESSION['auth']['id']);

            if ($userData) {
                //essaie de modification du profil
                $data = [
                    'lname' => $_POST['lname'],
                    'fname' => $_POST['fname'],
                    'email' => $_POST['email'],
                    'id' => $userData['id']
                ];
                //Modification du user 
                $updateUsers = updateUser($data);
                if ($_SESSION['auth']['role_id'] > 2) {
                    $url = './AcceuilClient.php';
                    header('Location: ' . $url);
                } else {
                    $url = './AcceuilAdmin.php';
                    header('Location: ' . $url);
                }
            }
        }
    }

    ?>

</body>