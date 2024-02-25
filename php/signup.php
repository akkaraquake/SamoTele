<?php
    session_start();
    require_once 'connect.php';

    $firstname=$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Проверка переменных на пустоту
    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password_confirm)) {
        $_SESSION['message'] = "Заполните все поля!";
        header("Location: ../registration.php");
        die();
    }

    $check_email = mysqli_query($connect, "SELECT `email` FROM `users` WHERE email = '$email'");

    if ((mysqli_num_rows($check_email)) == 0) {
        if ($password === $password_confirm) {
            $date = date("d.m.Y");
            mysqli_query($connect, "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `create_date`, `status_id`) 
                                                VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$date', 1)");
            header('Location: ../authorization.php');
        }
        else {
            $_SESSION['message'] = "Пароли не совпадают!";
            header('Location: ../registration.php');
        }
    }
    else {
        $_SESSION['email_message'] = "Введенная почта зарегистрирована!";
        header('Location: ../registration.php');
    }
    
    mysqli_close($connect);


?>