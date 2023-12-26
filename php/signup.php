<?php
    session_start();
    require_once 'connect.php';

    $firstname=$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    $check_email = mysqli_query($connect, "SELECT `email` FROM `users` WHERE email = '$email'");

    if ((mysqli_num_rows($check_email)) == 0) {
        if ($password === $password_confirm) {
            mysqli_query($connect, "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) 
                                                VALUES (NULL, '$firstname', '$lastname', '$email', '$password')");
            header('Location: ../profile.php');
        }
        else {
            $_SESSION['password_confirm_message'] = "Пароли не совпадают!";
            header('Location: ../registration.php');
        }
    }
    else {
        $_SESSION['email_message'] = "Введенная почта зарегистрирована!";
        header('Location: ../registration.php');
    }


?>