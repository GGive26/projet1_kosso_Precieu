<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthentificationAdministrateur</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="LoginAdmin">
    <h1>Entrez vos identifiants Administrateur</h1>

    <form class="form" action="../results/LoginResult.php" method="post">

    <fieldset>
        <legend>
        INFORMATION DE CONNECTION
        </legend>
                    <label for="user_name">Identifiant : </label>
                    <input type="text" id="user_name" name="user_name"><br><br> 

                    <label for="pwd">Password : </label>
                    <input type="text" id="pwd" name="pwd"><br>


    </fieldset>
    <input type="submit" value="Confirmrer">
<button><a href="../index.php">Annuler</a></button><br><br>

<h3 style="color: red;" > Si vous n'etes pas enregistrez chez nous,Le site ne seras pas accessible malheusement</h3>
    </form>
</body>
</html>