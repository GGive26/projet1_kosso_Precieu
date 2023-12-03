<?php

session_start();
$user_name = '';
if (isset($_SESSION['signup_form']['user_name'])) {
    $user_name = $_SESSION['signup_form']['user_name'];
}
$email = '';
if (isset($_SESSION['signup_form']['email'])) {
    $email = $_SESSION['signup_form']['email'];
}
$pwd = '';
if (isset($_SESSION['signup_form']['pwd'])) {
    $pwd = $_SESSION['signup_form']['pwd'];
}
$lname = '';
if (isset($_SESSION['signup_form']['lname'])) {
    $lname = $_SESSION['signup_form']['lname'];
}
$fname = '';
if (isset($_SESSION['signup_form']['fname'])) {
    $fname = $_SESSION['signup_form']['fname'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginClient</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="SignUp">
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
             <a class="nav-link" href="../index.php">Accueil<span class="sr-only">(current)</span></a>
         </li>
     </ul>
 </div>
</nav>

    <form method="post" action="../results/SignupResult.php" class="form">
        <fieldset>
            <legend>ENREGISTREMENT</legend>
    <div>
        <label for="user_name">Nom d'utilisateur</label>
        <input id="user_name" type="text" name="user_name" value="<?php echo $user_name ?>" >
        <p class="error"><?php echo isset($_SESSION['signup_errors']['user_name'])? $_SESSION['signup_errors']['user_name'] : '' ?></p>
    </div>
    <div>
        <label for="lname">Nom  : </label>
        <input id="lname" type="text" name="lname" value="<?php echo $lname ?>" >
        <p class="error"><?php echo isset($_SESSION['signup_errors']['lname'])? $_SESSION['signup_errors']['lname'] : '' ?></p>
    </div>
    <div>
        <label for="fname">Prenom : </label>
        <input id="fname" type="text" name="fname" value="<?php echo $fname ?>" >
        <p class="error"><?php echo isset($_SESSION['signup_errors']['fname'])? $_SESSION['signup_errors']['fname'] : '' ?></p>
    </div>
    <div>
    <label for="email">Courriel</label>
    <input id="email" type="text" name="email" value="<?php echo $email ?>">
    <p class="error"><?php echo isset($_SESSION['signup_errors']['email'])? $_SESSION['signup_errors']['email'] : '' ?></p>

    </div>
    <div>
    <label for="pwd">Mot de passe</label>
    <input id="pwd" type="text" name="pwd" value="<?php echo $pwd ?>">
    <p class="error"><?php echo isset($_SESSION['signup_errors']['pwd'])? $_SESSION['signup_errors']['pwd'] : '' ?></p>
 
    </div>
        </fieldset>
    <input type="submit" value="Enregistrer">
    </form>
</body>
</html>