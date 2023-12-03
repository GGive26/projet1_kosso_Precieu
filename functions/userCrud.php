<?php

function createUser(array $data)
{
    global $conn;
    
    $query = "INSERT INTO user VALUES (NULL,?,?,?,?,?,0,0,'',3);";

$stmt = mysqli_prepare($conn, $query);
var_dump($stmt);

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

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Get all users
 */
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
/**
 * Get user by id
 */

 //Todo: edit to prepare
function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}
function getUserBylname(string $lname)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.lname = '" . $lname . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}
function getUserByfname(string $fname)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.fname = '" . $fname . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

/**
 * Update user
 */
function updateUser(array $data)
{
    global $conn;
    

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Delete user
 */
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

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

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

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}