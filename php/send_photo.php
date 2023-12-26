<?php
    session_start();
    require_once 'connect.php';
    
    $photo = $_FILES["avatar"];
    print_r($_SESSION);
    print_r($photo);
    $user_id = $_SESSION['user']['id'];

    $photo_path = 'uploads/' . time() . $_FILES['avatar']['name']; // Путь, куда будет загружено фото
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $photo_path);

    // обновляем значения поля avatar (вставляем путь к фото)
    mysqli_query($connect, "UPDATE `users` SET avatar = '$photo_path' WHERE id ='$user_id'"); 

    header("Location: ../profile.php");

?>