<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ");

    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "firstname" => $user['firstname'],
            "lastname" => $user['lastname'],
            "email" => $user['email'],
            "password" => $user['password'],
            "avatar" => $user['avatar'],
            "create_date" => $user['create_date'],
            "birth_date" => $user['birth_date']
        ];

        header('Location: ../profile.php');
    }
    else {
        $_SESSION['auth_message'] = "Неверная почта или пароль!";
        header('Location: ../authorization.php');
    }
?>