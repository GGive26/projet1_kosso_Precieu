<a href="../">Accueil</a>
<?php
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
session_start();
if (isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);

    $fieldValidation = true;
    // valid user name
    if (isset($_POST['user_name'])) {
        $nameIsValidData = usernameIsValid($_POST['user_name']);

        if ($nameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    if (isset($_POST['lname'])) {
        $lnameIsValidData = lastnameIsValid($_POST['lname']);

        if ($lnameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    if (isset($_POST['fname'])) {
        $fnameIsValidData = firstnameIsValid($_POST['fname']);

        if ($fnameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    if (isset($_POST['shipping_address_id'])) {
        $shippingIsValidData = shippingAddressValidation($_POST['shipping_address_id']);

        if ($shippingIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    if (isset($_POST['billing_address_id'])) {
        $billingIsValidData = billingAddressValidation($_POST['billing_address_id']);

        if ($billingIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    //valid email
    if (isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if ($emailIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    // valid mdp
    if (isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if ($pwdIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    if ($fieldValidation == true) {
        //envoyer à la DB

        $encodedPwd = encodePwd($_POST['pwd']);
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' => $encodedPwd
        ];
         createUser($data);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg'],
            'shipping_address_id'=>$shippingIsValidData['msg'],
            'lname'=>$lnameIsValidData['msg'],
            'fname'=>$fnameIsValidData['msg'],
            'billing_address_id'=>$billingIsValidData['msg']
        ];
        $url = '../pages/SignUpClient.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../pages/SignUpClient.php';
    header('Location: ' . $url);
}

