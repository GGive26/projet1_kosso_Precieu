<?php

session_start();
var_dump($_SESSION);
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
$shippingAddress = '';
if (isset($_SESSION['signup_form']['shipping_address_id'])) {
    $shippingAddress = $_SESSION['signup_form']['shipping_address_id'];
}
$billingAddress = '';
if (isset($_SESSION['signup_form']['billing_address_id'])) {
    $billingAddress = $_SESSION['signup_form']['billing_address_id'];
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
    <h1> Bienvenue</h1>

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
        <label for="shipping_address_id">Num Addresse de facturation :</label>
        <input id="shipping_address_id" type="text" name="shipping_address_id" value="<?php echo $shippingAddress ?>">
        <p class="error"><?php echo isset($_SESSION['signup_errors']['shipping_address_id'])? $_SESSION['signup_errors']['shipping_address_id'] : '' ?></p>
    </div>
    <div>
        <label for="billing_address_id">Num Address de Livraison :</label>
        <input id="billing_address_id" type="text" name="billing_address_id" value="<?php echo $billingAddress ?>">
        <p class="error"><?php echo isset($_SESSION['signup_errors']['billing_address_id'])? $_SESSION['signup_errors']['billing_address_id'] : '' ?></p>
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