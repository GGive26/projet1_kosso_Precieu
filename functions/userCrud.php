<?php
//creation d'un client
function createUser(array $data)
{
    global $conn;

    $query = "INSERT INTO user VALUES (NULL,?,?,?,?,?,0,0,'',3);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
        );

        $result = mysqli_stmt_execute($stmt);
    }
}

//recuperation des utulisateurs 
function getAllUsers()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    return $data;
}

//recuperation d'un user avec son id
function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

//recuperation d'un user avec son userName
function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);
    return $data;
}
//recuperation d'un user avec son last Name
function getUserBylname(string $lname)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.lname = '" . $lname . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}
//recuperation d'un user avec son First Name
function getUserByfname(string $fname)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.fname = '" . $fname . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

//mofification d'un user 
function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET  email = ?,lname = ?, fname = ? WHERE user.id = ?;";

    $stmt = mysqli_prepare($conn, $query);


    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssi",
            $data['email'],
            $data['lname'],
            $data['fname'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//suppresion d'un user
function deleteUser(int $id)
{
    global $conn;

    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );


        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//modification du token
function updateToken(array $data)
{
    global $conn;

    $query = "UPDATE user SET token=?
            WHERE user.user_name = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $data['token'],
            $data['user_name']
        );


        $result = mysqli_stmt_execute($stmt);
    }
}

//creation d'un produit
function createProduct(array $data)
{
    global $conn;

    $query = "INSERT INTO product VALUES (NULL,?,?,?,?,?);";

    $stmt = mysqli_prepare($conn, $query);
    var_dump($stmt);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "siiss",
            $data['name'],
            $data['quantity'],
            $data['price'],
            $data['img_url'],
            $data['description'],
        );


        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//recuperation d'un produit
function getProduct(string $name)
{
    global $conn;
    $query = "SELECT * FROM product WHERE product.name = ?;";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $name
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//fonction d'afficahge des produits 
function afficherProduit()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };
    return $data;
}
//changemnt du role_id
function updateRoleId(array $data)
{
    global $conn;

    $query = "UPDATE user SET role_id=?
            WHERE user.user_name = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "is",
            $data['role_id'],
            $data['user_name']
        );


        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//suppression d'un produit
function deleteProduct(string $name)
{
    global $conn;

    $query = "DELETE FROM product
                WHERE product.name = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $name,
        );

        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//permet de relier le billing et shipping address a l'id du client
function upUserId(string $id)
{
    global $conn;

    $query = "UPDATE user SET billing_address_id='" . $id . "',shipping_address_id='" . $id . "'
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id
        );


        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//recupere tout mes clients 
function getAllClient()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE role_id!=1");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    return $data;
}

//recupere les details de la  commande grace a l'id
function getOrderById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM order_has_product  WHERE product_id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

//creation d'un  details de produit
function createOrderProduct(array $data)
{
    global $conn;

    $query = "INSERT IGNORE INTO order_has_product VALUES ('" . $data["order_id"] . "',?,?,?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "iii",
            $data['product_id'],
            $data['quantity'],
            $data['price']
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//recupere la commande avec l'id
function getUserOrderById(int $id)
{
    global $conn;
    $query = "SELECT * FROM user_order  WHERE user_order.user_id = '" . $id . "';";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
}


// creation d'une commande
function createUserOrderProduct(array $data)
{
    global $conn;

    $query = "INSERT IGNORE INTO user_order VALUES (NULL,'',?,?,?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sii",
            $data['date'],
            $data['total'],
            $data['user_id']
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}

//recupere le produit grace a l'id
function getProductById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM product  WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

//creer une addresse
function createAdresse(array $data)
{
    global $conn;

    $query = "INSERT INTO address VALUES (NULL,?,?,?,?,?,?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sissss",
            $data['street_name'],
            $data['street_nb'],
            $data['city'],
            $data['province'],
            $data['zip_code'],
            $data['country']
        );

        $result = mysqli_stmt_execute($stmt);
    }
}
