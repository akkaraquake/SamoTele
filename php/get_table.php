<?php
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    $table_name = $_GET['table_name'];


    $get_words = mysqli_query($connect, "SELECT `word`, `word_translate` FROM `words` WHERE `section_name` = '$table_name' AND `user_id` = '$id'");

    $words_list = mysqli_fetch_all($get_words);

    foreach($words_list as $words) {
        
        $words_to_table = json_encode($words, JSON_UNESCAPED_UNICODE);
        print_r(json_encode($words, JSON_UNESCAPED_UNICODE));


    }
    print_r($words_list);
    header("Location: ../sbornik.php");
?>