<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginClient</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="SignUp">
    <h1> Bienvenue</h1>


    <form method="post" action="" class="form">

<fieldset>
    <legend>
    Entrez vos informations
    </legend>
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="lname"><br><br>

                <label for="prenom">Prenom : </label>
                <input type="text" id="prenom" name="fname"><br><br>

                <label for="adressefacturation">Age : </label>
                <input type="text" id="adressefacturation" name="billing_adress"><br><br>

                <label for="email">E-mail : </label>
                <input type="text" name="email" id="email"><br><br>

                <label for="password">Password : </label>
                <input type="text" id="password" name="pwd"><br><br>
</fieldset>
<input type="submit" value="Confirmrer">
<button><a href="../index.php">Annuler</a></button>
</form>
</body>
</html>