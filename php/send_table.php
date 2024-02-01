<?php 
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];
    echo $id;
    $table_name = $_POST['table_name'];

    // Получение данных таблицы из формы
    $tableData = json_decode($_POST['tableData'], true);

    print_r($tableData);
    echo count($tableData);
    print_r($_POST);
    echo "<br/>";

    // Проверяем наличие раздела в базе данных
    $check_section = mysqli_query($connect, "SELECT * FROM `sections`");
    $check_section_list = mysqli_fetch_assoc($check_section);
    print_r($check_section_list);

    if ($check_section_list['section_name'] === $table_name && $check_section_list['user_id'] === $id) {
        $_SESSION['section_message'] = "Раздел с таким именем уже создан!";
        header("Location: ../sbornik.php");
        die();
    }


    // Переносим название раздела в базу данных
    mysqli_query($connect, "INSERT INTO `sections` (`section_name`, `user_id`) VALUES ('$table_name', '$id')");

    // Переносим слова в базу данных
    // foreach($tableData as $words) {
    //     $word = $words[0];
    //     $word_translate = $words[1];
    //     echo $word, $word_translate;
    //     mysqli_query($connect, "INSERT INTO `words` (`word_id`, `word`, `word_translate`, `section_name`) VALUES (NULL, '$word', '$word_translate', '$table_name')");   
    // }
   
    $stmt = mysqli_prepare($connect, "INSERT INTO words (word_id, word, word_translate, section_name, user_id) VALUES (NULL, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, 'sssi', $word, $word_translate, $table_name, $id);

    foreach($tableData as $words) {
        $word = $words[0];
        $word_translate = $words[1];
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);

    header("Location: ../sbornik.php");
?>