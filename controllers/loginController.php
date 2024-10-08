<?php





$invalidLogin = 0;

function loginCheck()
{
    require_once('./unitils/connection.php');
    $stmt = $db->prepare("SELECT * FROM customers WHERE email = :email");

    $stmt->bindParam(':email', $_POST['email']);

    $stmt->execute();
    $data = $stmt->fetch();
    if ($data) {
        if (password_verify($_POST['password'], $data['password'])) {
            $_SESSION['loggedIn'] = 1;
            $_SESSION['loggedInUser'] = [
                "userId" => $data['id'],
                "admin" => $data['isAdmin']
            ];
            header('location: ../?page=user');
        } else {
            $_SESSION['loggedIn'] = 2;
            header('location: ../?page=user');
        }
        exit();
    } else {
        $_SESSION['loggedIn'] = 2;
        header('location: ../?page=user');
    }
}
