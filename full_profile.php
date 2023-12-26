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

    <div class="main_frame">
        <!--Содержимое окна после нажатия кнопки "Профиль"-->
        <div class="avatar">
            <div class="avatar_and_name">
                <img class="avatar_image" src="images/avatar_frame.png" alt="">
                <p id="noselect"><?= ($_SESSION['user']['lastname'] . " " . $_SESSION['user']['firstname'])?></p>
                <script>
                    document.getElementById('noselect').addEventListener('focus', function () {
                        document.getElementById('noselect').blur();
                    });
                    document.getElementById('noselect').style.cursor = 'default';
                </script>
            </div>
            <!-- добавить функцию загрузки фото-->

            <div class="person_info">
                
                <ul class="info_menu">
                    <li>Email: <input class="input_info"></li>
                    <li>Пароль: <input class="input_info"></li>
                    <br></br>
                    <li>Новый пароль: <input class="input_info"></li>
                    <li>Подтвердите новый пароль: <input class="input_info"></li>
                </ul>
            </div>
            
            <a href="php/logout.php">Выйти из профиля</a>
        </div>
    </div>




    <footer>
        AkkaraQuake &copy;
    </footer>
</body>

</html>