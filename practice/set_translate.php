<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../authorization.php');
        die();
    }
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SamoTele</title>
        <link rel="stylesheet" href="../style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <nav>
                <a class="logo">SamoTэле</a>
                <div class="practise navigation_panel_element"><a class="navigation_panel_element_practise"
                        href="#">Практика</a>
                    <img id="pen" src="../images/pen.png" alt="">
                </div>
                <a class="navigation_panel_element" href="#">Сборник</a>
                <a class="navigation_panel_element" href="#">Профиль</a>
            </nav>
        </header>

        <div class="main_frame main_frame_practice">
            <div id="doing_exercise">
                <p id="input_translate_label">Введите перевод</p>
                <div class="exercise_status">
                    <progress id="exercise_status_progress" value="1"></progress>
                    <p class="exercise_status_count_words"><span id="count_input_translates" title="Количество введенных переводов">1</span> / 
                    <span id="count_all_translates" title="Количество общее переводов в упражнении"></span></p>
                </div>
                <div class="exercise_area">
                    <p id="word">слово</p>
                    <label id="right_answer">Правильный ответ: <span id="right_translate">word</span></label>
                    <div class="input_translate_and_confirm_answer">
                        <input type="text" id="input_translate" title="Для подтверждения ответа можно использовать Enter" autofocus>
                        <button id="confirm_translate_btn" title="Подтвердить ответ"><span id="confirm_translate_checkbox"></span></button>
                    </div>
                    <button id="go_to_next_word" title="Для нажатия этой кнопки можно использовать Enter" disabled>Дальше &gt;&gt;</button>

                </div>
            </div>
            <div id="results">
                <p id="results_table_label">Таблица результатов</p>
                <p id="answers_status">Верных ответов: <span id="count_right_answers"></span> / <span id="count_all_answers"></span></p>
                <div class="table_frame" style="width: 80%; max-height: 300px;">
                    <table id="table_to_view">
                        <tr style="text-align: center; font-size: 30px; font-weight: bold">
                            <td>Слово</td>
                            <td style="color: #0075FF;">???</td>
                        </tr>

                    </table>
                </div>
                <form action="../practice.php" style="margin-right: 20px;">
                    <button id="back_to_practice" title="Сойдет"><span id="good"></span></button>
                </form>
                
            </div>
            
        </div>




        <footer>
            AkkaraQuake &copy;
        </footer>
        <script src="../js/location.js"></script>
        <script src="../js/exercise_1.js"></script>
    </body>

</html>