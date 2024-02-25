<?php 
    session_start();
    require_once 'connect.php';

    $firstname=$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $password = $_POST['new_password'];
    $password_confirm = $_POST['new_password_confirm'];

    $id = $_SESSION['user']['id'];

    // Проверка переменных на пустоту
    if(empty($firstname) || empty($lastname) || empty($birth_date) || empty($email)) {
        $_SESSION['message'] = "Заполните все поля!";
    }
    else {
        // Проверяем, есть ли в базе данных введенная почта
        $check_email = mysqli_query($connect, "SELECT `email` FROM `users` WHERE email = '$email' AND id != '$id'");

        if ((mysqli_num_rows($check_email)) == 0) {

            // Проверяем, будет ли изменен еще и пароль, помимо других данных
            if (empty($password) && empty($password_confirm)) {
                mysqli_query($connect, "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', 
                                                        `email` = '$email', `birth_date` = '$birth_date' 
                                                    WHERE id = '$id'");

                $_SESSION['message'] = "Данные успешно изменены!";
            }
            else {
                if ($password === $password_confirm) {
                    mysqli_query($connect, "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', 
                                                            `email` = '$email', `password` = '$password', `birth_date` = '$birth_date' 
                                                        WHERE id = '$id'");
    
                    $_SESSION['message'] = "Данные успешно изменены!";
    
    
                }
                else {
                    $_SESSION['message'] = "Пароли не совпадают!";
                }
            }
        }
        else {
            $_SESSION['message'] = "Введенная почта зарегистрирована!";
        }
    }

    // Обновляем данные
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$id'");

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

    header('Location: ../full_profile.php');

    mysqli_close($connect);
?>