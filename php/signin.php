<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ");
    echo $check_user == true;
    if (mysqli_num_rows($check_user) > 0) {

        echo mysqli_num_rows($check_user);
        $user = mysqli_fetch_assoc($check_user);
        print_r($user);

        $_SESSION['user'] = [
            "firstname" => $user['firstname'],
            "lastname" => $user['lastname'],
            "email" => $user['email'],
            "password" => $user['password'],
        ];

        print_r($_SESSION['user']);

        header('Location: ../profile.php');
    }
    else {
        $_SESSION['auth_message'] = "Неверная почта или пароль!";
        header('Location: ../authorization.php');
    }
?>