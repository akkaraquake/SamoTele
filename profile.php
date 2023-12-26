<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: authorization.php');
    }

    // Проверяем наличие фото в базе данных
    require_once 'php/connect.php';
    $user_id = $_SESSION['user']['id'];
    $check_photo = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE id = '$user_id'");
    $photo_path = mysqli_fetch_assoc($check_photo)["avatar"]; // получаем путь к файлу
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

    <div class="main_frame_profile main_frame">
        <!--Содержимое окна после нажатия кнопки "Профиль"-->
        <div class="avatar">
            <div class="avatar_and_name">
                <img class="avatar_image" src="images/avatar_frame.png" alt="">
                <div class="oval_avatar">
                    <?php
                        if ($photo_path !== null):
                            $_SESSION['user']['avatar'] = $photo_path;
                            echo '<img src="' . $photo_path . '" class="oval_avatar_image ">';
                        else: 
                    ?>
                            <form action="php/send_photo.php" method="post" enctype="multipart/form-data" class="send_photo_form">
                                <img src="images/upload_icon.png" alt="Иконка загрузки"><br/>
                                <input type="file" id="upload_avatar" name="avatar" hidden>
                                <label id="upload_avatar_btn" class="upload_avatar_label">Загрузить фото</label>
                                <button id="hidden_submit_btn" type="submit" hidden></button>
                                
                            </form> 
                   <?php endif; ?>
                    </div>
                
                <!-- добавить функцию загрузки фото-->
                <p id="noselect"><?= ($_SESSION['user']['lastname'] . " " . $_SESSION['user']['firstname'])?></p>
                <script>
                    document.getElementById('noselect').addEventListener('focus', function () {
                        document.getElementById('noselect').blur();
                    });
                    document.getElementById('noselect').style.cursor = 'default';
                </script>
            </div>
            
            
        </div>
        <div class="personal_status">
            <p class="status_name">Начинающий</p>
            <progress value="10" max="100"></progress>
            <p class="count_words"><span style="color: #E53F3F">10</span> / <span style="color: #00FF66">100</span></p>
            <form action="php/logout.php">
                <button type="submit" class="logout">Выйти из профиля</button>
            </form>
        </div>
    </div>




    <footer>
        AkkaraQuake &copy;
    </footer>
    <script src="upload_photo.js"></script>
</body>

</html>