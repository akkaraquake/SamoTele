<?php

    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../authorization.php');
        die();
    }

    require_once '../php/connect.php';

    $id = $_SESSION['user']['id'];
    $selected_sections = json_decode($_GET['selected_sections'], true);


    $words = [];

    // Получаем слова из выбранных разделов
    foreach ($selected_sections as $section) {

        $get_words_from_section = mysqli_query($connect, "SELECT `word`, `word_translate` FROM `words` WHERE `section_name` = '$section' AND `user_id` = '$id'");

        while ($row = mysqli_fetch_assoc($get_words_from_section)) {
            $words[] = $row;
        }

    }

    // Перемешиваем 
    shuffle($words);

    echo json_encode($words, JSON_UNESCAPED_UNICODE);

    mysqli_close($connect);
    

?>