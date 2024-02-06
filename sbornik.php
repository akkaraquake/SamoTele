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
                <option class="section_item" value="">Содержимое раздела</option>
                <option class="section_item" value="">Создание раздела</option>
            </select>
        </div>

        <div class="function_frame">
            <ul class="content_list">
                <!-- Содержимое окна после выбора из списка "Список разделов" -->
                <li class="content_item is-active">
                    
                        
                </li>
                <!-- Содержимое окна после выбора из списка "Изменение раздела" -->
                <li class="content_item">
                    <div class="section_name">
                        <div class="get_table_form">
                            <label>Название раздела</label>
                            <input type="text" id="table_name_to_change">
                            <button id="get_table_to_change_btn">Получить</button>
                            
                        </div>
                        <br>
                        <br>
                        <div class="table_params">
                            <div class="section_name_2">
                                <label>Новое название раздела</label>
                                <input type="text" id="new_name">
                            </div>
                            <div class="section_count_words">
                                <label>Количество cтрок</label>
                                <div>
                                    <input type="text" id="new_count_words">
                                    <button type="button" id="plus_button" onclick="add_rows(document.getElementById('new_count_words').value);" disabled>&plus;</button>
                                    <button type="button" id="minus_button" onclick="remove_rows(document.getElementById('new_count_words').value);" ondblclick="$('.is-active tr').slice().remove();" title="Кликните дважды, чтобы удалить таблицу" disabled>&minus;</button>
                                </div>
                                
                            </div>
                            <input id="tableDataInput_changed" hidden>
                            <button id="submit_table_to_change_btn" style="margin-left: 100px;">Сохранить</button>
                        </div>
                        <div class="table_frame">
                            <table id="table_to_change">
                            </table>
                        </div>
                    </div> 
                </li>
                <!-- Содержимое окна после выбора из списка "Содержимое раздела" -->
                <li class="content_item">
                    <div class="section_name">
                        <div class="get_table_form">
                            <label>Название раздела</label>
                            <input type="text" id="table_name_to_view">
                            <button id="get_table_to_view_btn">Получить</button>
                            
                        </div>
                        <div class="table_frame">
                            <table id="table_to_view">
                            </table>
                        </div>
                    </div>    
                        
                </li>
                <!-- Содержимое окна после выбора из списка "Создание раздела" -->
                <li class="content_item">
                    <div>
                        <div class="table_params">
                            <div class="section_name_2">
                                <label>Название раздела</label>
                                <input type="text" id="name">
                            </div>
                            <div class="section_count_words">
                                <label>Количество cтрок</label>
                                <div>
                                    <input type="text" id="count_words">
                                    <button type="button" id="plus_button" onclick="create_table(document.getElementById('count_words').value);">&plus;</button>
                                    <button type="button" id="minus_button" onclick="remove_rows(document.getElementById('count_words').value);" ondblclick="$('.is-active tr').slice().remove();" title="Кликните дважды, чтобы удалить таблицу">&minus;</button>
                                </div>
                                
                            </div>
                            <input id="tableDataInput" hidden>
                            <button id="submit_table_btn" style="margin-left: 100px;">Сохранить</button>
                        </div>
                        
                        <div class="table_frame" style="width: 100%;">
                            <table id="table">
                            </table>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </div>

    </div>
    <footer>
        AkkaraQuake &copy;
    </footer>

    <script src="sbornikFrame.js"></script>
    <script src="create_table.js"></script>
    <script src="add_rows.js"></script>
    <script src="convert_table.js"></script>
    <script src="get_table_to_change.js"></script>
    <script src="get_table_to_view.js"></script>
    <script src="remove_table.js"></script>
    <script src="remove_rows.js"></script>
    <script src="table_request.js"></script>
</body>
</html>