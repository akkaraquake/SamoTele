<?php
    session_start();
    require_once 'connect.php';
    
    $photo_name = $_FILES["avatar"]["name"];
    $photo_extenshion = end(explode(".", $_FILES["avatar"]["name"])); // Получаем строку с расширением загруженного фото
    echo $photo_extenshion;

    if ($photo_extenshion == "png" || $photo_extenshion == "jpg" || $photo_extenshion == "jpeg") {

        $user_id = $_SESSION['user']['id'];

        $photo_path = 'uploads/' . time() . $_FILES['avatar']['name']; // Путь, куда будет загружено фото
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $photo_path);

        // обновляем значения поля avatar (вставляем путь к фото)
        mysqli_query($connect, "UPDATE `users` SET avatar = '$photo_path' WHERE id ='$user_id'"); 

        // Возвращаемся на страницу, откуда был отправлен запрос на загрузку фото
        header("Location:" . $_SERVER['HTTP_REFERER'] . "");
        
        

    }
    else {

        $_SESSION["error_photo_extenshion"] = "Формат файла должен быть с расширением png, jpg или jpeg!";
        header("Location: ../profile.php");
        
    }
    
    mysqli_close($connect);
    
?>