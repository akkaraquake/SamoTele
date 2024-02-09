<?php 
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    $table_name = $_POST['table_name'];
    $new_table_name = $_POST['new_table_name'];
    // echo $table_name;
    // Получение данных таблицы из формы
    $tableData = json_decode($_POST['tableData'], true);
    // print_r($tableData);

    // Проверяем, не повторяется ли новое название раздела в базе данных
    if ($new_table_name) {
        $check_section = mysqli_query($connect, "SELECT * FROM `sections`");
        $check_section_list = mysqli_fetch_all($check_section, MYSQLI_ASSOC);

        foreach($check_section_list as $section_list) {
            // if ($section_list['section_name'] == $table_name && $section_list['user_id'] == $id) {
            //     $_SESSION['section_message'] = "Раздел с таким именем уже создан!";
            //     header("Location: ../sbornik.php");
            //     die();
            // }
    
            if ($section_list['section_name'] == $new_table_name && $section_list['user_id'] == $id) {
                http_response_code(422);
                die();
            }
        }
    }
    


    // Обновляем раздел (удаляем старые слова и загружаем новые)



    // удаляем
    mysqli_query($connect, "DELETE FROM `words` WHERE section_name = '$table_name' AND user_id = '$id'");



    // загружаем    
    $stmt = mysqli_prepare($connect, "INSERT INTO words (word_id, word, word_translate, section_name, user_id) VALUES (NULL, ?, ?, ?, ?)");

    if ($new_table_name) {
        mysqli_stmt_bind_param($stmt, 'sssi', $word, $word_translate, $new_table_name, $id);
    }
    else {
        mysqli_stmt_bind_param($stmt, 'sssi', $word, $word_translate, $table_name, $id);
    }
    

    // Цикл с проверкой на наличие пустых строк в таблице
    foreach($tableData as $words) {
        
        $word = $words[0];
        $word_translate = $words[1];

        if ($word == "" || $word_translate == "") {
            http_response_code(400);
            die();
        }
        
    }

    // Цикл с загрузкой слов в бд
    foreach($tableData as $words) {
        
        $word = $words[0];
        $word_translate = $words[1];

        mysqli_stmt_execute($stmt);
        
    }

    mysqli_stmt_close($stmt);

    // Переносим новое название раздела в базу данных (если было введено)
    if ($new_table_name) {
        mysqli_query($connect, "DELETE FROM `sections` WHERE section_name = '$table_name' AND user_id = '$id'");
        mysqli_query($connect, "INSERT INTO `sections` (`section_name`, `user_id`) VALUES ('$new_table_name', '$id')");
    }
    

    mysqli_close($connect);

    echo http_response_code(200);
?>