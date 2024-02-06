<?php
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    $table_name = $_GET['table_name'];


    $json_data = [];

    $get_words = mysqli_query($connect, "SELECT `word`, `word_translate` FROM `words` WHERE `section_name` = '$table_name' AND `user_id` = '$id'");

    while ($row = mysqli_fetch_assoc($get_words)) {
        $json_data[] = $row;
    }

    // Если данные не найдены
    if ($json_data == []) {
        http_response_code(404);
    }

    echo json_encode($json_data, JSON_UNESCAPED_UNICODE);

    
?>