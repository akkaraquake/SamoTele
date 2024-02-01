<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: authorization.php');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamoTele</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <a class="logo">SamoTэле</a>
            <div class="practise navigation_panel_element"><a class="navigation_panel_element_practise"
                    href="practise.html">Практика</a>
                <img id="pen" src="images/pen.png" alt="">
            </div>
            <a class="navigation_panel_element" href="sbornik.html">Сборник</a>
            <a class="navigation_panel_element" href="profile.php">Профиль</a>
        </nav>
    </header>

    <div class="main_frame_sbornik main_frame">
        <!--Содержимое окна после нажатия кнопки "Сборник"-->
        <div name="function_list" class="function_list">
            <select name="function_menu" id="function_menu">
                <option class="section_item is-active" value="">Список разделов</option>
                <option class="section_item" value="">Изменение раздела</option>
                <option class="section_item" value="">Загрузка раздела</option>
                <option class="section_item" value="">Создание раздела</option>
            </select>
        </div>

        <div class="function_frame">
            <ul class="content_list">
                <li class="content_item is-active">
                    <div class="section_name">
                        <?php 
                            // Выводим сообщение об ошибке, если названный раздел уже был создан
                            if (isset($_SESSION['section_message'])) {
                                echo '<script>alert("' . $_SESSION['section_message'] . '");</script';
                            }
                            unset($_SESSION['section_message']);
                        ?>
                        <form action="php/get_table.php" method="get" class="get_table_form">
                            <label>Название раздела</label>
                            <input type="text" id="name" name="table_name">
                            <button type="submit" onclick="$.ajax({
                                                                    url: 'get_table.php',
                                                                    type: 'GET',
                                                                    dataType: 'json',
                                                                    success: function(data) {
                                                                        // Обработка данных JSON
                                                                        getTable();
                                                                        console.log(data);
                                                                    },
                                                                    error: function(xhr, status, error) {
                                                                        // Обработка ошибок
                                                                        console.error(error);
                                                                    }
                                                                });">
                    Получить</button>
                        </form>
                        
                </li>
                <li class="content_item">Содержимое "Изменение раздела"</li>
                <li class="content_item">Содержимое "Загрузка раздела"</li>
                <li class="content_item">
                    <form action="php/send_table.php" method="post">
                        <div class="table_params">
                            <div class="section_name">
                                <label>Название раздела</label>
                                <input type="text" id="name" name="table_name">
                            </div>
                            <div class="section_count_words">
                                <label>Количество cтрок</label>
                                <input type="text" id="count_words">
                                <button type="button" id="create_table_btn" onclick="create_table(document.getElementById('count_words').value);" style="margin: 0">&plus;</button>
                            </div>
                            <input type="hidden" name="tableData" id="tableDataInput">
                            <button id="submit_table_btn" onclick="convert_table();" type="submit">Сохранить</button>
                        </div>
                        
                        <div class="table_frame">
                            <table id="table">
                            </table>
                        </div>
                    </form>
                    
                </li>
            </ul>
        </div>

    </div>
    <footer>
        AkkaraQuake &copy;
    </footer>

    <script src="sbornikFrame.js"></script>
    <script src="create_table.js"></script>
    <script src="convert_table.js"></script>
</body>
</html>