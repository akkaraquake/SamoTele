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
                        href="practice.php">Практика</a>
                    <img id="pen" src="images/pen.png" alt="">
                </div>
                <a class="navigation_panel_element" href="sbornik.php">Сборник</a>
                <a class="navigation_panel_element" href="profile.php">Профиль</a>
            </nav>
        </header>

        <div class="main_frame main_frame_practice">
            <p id="choose_sections_and_exercise_label">Выберите разделы и упражнение</p>
            <div class="choose_sections">
                <p id="select_status">Разделы не выбраны!</p>
                <button id="select_sections_btn">Выбрать разделы</button>
                <div class="selected_sections_list">
                    <p id="selected_sections_list_menu">Список выбранных разделов</p>
                    <div id="dropdown_list">
                    </div>
                </div>
                
            </div>
            
            <div class="exercises">
                <a href="practice/set_translate.php" class="exercise disabled">
                    <img src="images/exercise_1.png" alt="" style="width: 80px; height: 80px;"> <span style="margin-left: 50px; color: black;">Слово - <span style="color: #0075FF;">???</span></span>
                </a>
                <a href="practice/set_word.php" class="exercise disabled">
                    <img src="images/exercise_2.png" alt="" style="width: 80px; height: 80px;"> <span style="margin-left: 50px; color: black;"><span style="color: #0075FF;">???</span> - Перевод</span>
                </a>
            </div>
        </div>




        <footer>
            AkkaraQuake &copy;
        </footer>
        <script src="js/location.js"></script>
        <script src="js/choose_sections.js"></script>
        <script src="js/dropdown_list.js"></script>
    </body>

</html>