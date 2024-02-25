<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: authorization.php');
        die();
    }

    // Проверяем наличие фото в базе данных
    require_once 'php/connect.php';
    $user_id = $_SESSION['user']['id'];
    $check_photo = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE id = '$user_id'");
    $photo_path = mysqli_fetch_assoc($check_photo)["avatar"]; // получаем путь к файлу

    // Получаем текущий статус
    $get_words = mysqli_query($connect, "SELECT * FROM `words` WHERE user_id = '$user_id'");
    $count_words = mysqli_num_rows($get_words);

    if ($count_words >= 0 && $count_words <= 100) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 1");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 100;
    }
    else if ($count_words > 100 && $count_words <= 250) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 2");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 250;
    }
    else if ($count_words > 250 && $count_words <= 500) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 3");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 500;
    }
    else if ($count_words > 500 && $count_words <= 1000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 4");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 1000;
    }
    else if ($count_words > 1000 && $count_words <= 2000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 5");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 2000;
    }
    else if ($count_words > 2000 && $count_words <= 3000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 6");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 3000;
    }
    else if ($count_words > 3000 && $count_words <= 4000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 7");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 4000;
    }
    else if ($count_words > 4000 && $count_words <= 5000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 8");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 5000;
    }
    else if ($count_words > 5000 && $count_words <= 6000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 9");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 6000;
    }
    else if ($count_words > 6000 && $count_words <= 7000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 10");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 7000;
    }
    else if ($count_words > 7000 && $count_words <= 10000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 11");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 10000;
    }
    else if ($count_words > 10000 && $count_words <= 15000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 12");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 15000;
    }
    else if ($count_words > 15000 && $count_words <= 20000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 13");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 20000;
    }
    else if ($count_words > 20000) {
        $get_status = mysqli_query($connect, "SELECT * FROM `statuses` WHERE status_id = 14");

        $status = mysqli_fetch_assoc($get_status);

        $_SESSION['user']['status_id'] = $status['status_id'];
        $_SESSION['user']['status'] = $status['status'];
        $_SESSION['user']['max_count'] = 40000;
    }
    // Устанавливаем id статуса в таблицу `users` бд
    $status_id = $_SESSION['user']['status_id'];
    mysqli_query($connect, "UPDATE `users` SET status_id = '$status_id' WHERE id = '$user_id'");

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
                    href="practice.php">Практика</a>
                <img id="pen" src="images/pen.png" alt="">
            </div>
            <a class="navigation_panel_element" href="sbornik.php">Сборник</a>
            <a class="navigation_panel_element" href="profile.php">Профиль</a>
        </nav>
    </header>

    <div class="main_frame_profile main_frame">
        <!--Содержимое окна после нажатия кнопки "Профиль"-->
        <div class="avatar">
            <div class="avatar_and_name">
                <img id="change_avatar" class="avatar_image" src="images/avatar_frame.png" title="Кликните дважды, чтобы изменить фото">
                <div class="oval_avatar">
                    <!-- Реализация загрузки фото -->
                    <?php
                        if ($photo_path !== null):

                            $_SESSION['user']['avatar'] = $photo_path;

                            // Загружаем фото из базы данных и добавляем невидимую форму в случае, если нужно заменить фото
                            echo '<img src="' . $photo_path . '" class="oval_avatar_image ">
                            <form action="php/send_photo.php" method="post" enctype="multipart/form-data" class="send_photo_form" style="display:none">
                                <img src="images/upload_icon.png" alt="Иконка загрузки"><br/>
                                <input type="file" id="upload_avatar" name="avatar" hidden>
                                <label id="upload_avatar_btn" class="upload_avatar_label">Загрузить фото</label>
                                <button id="hidden_submit_btn" type="submit" hidden></button>  
                            </form> ';
                            
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
                
                
            </div>
            <p id="fullname" class="fullname" style="cursor: default;"><?= ($_SESSION['user']['lastname'] . " " . $_SESSION['user']['firstname'])?></p>
            
        </div>
        
        <div class="personal_status">
            <p class="status_name"><?= $_SESSION['user']['status'] ?></p>
            <progress class="status_progress" value="<?= $count_words ?>" max="<?= $_SESSION['user']['max_count'] ?>"></progress>
            <p class="count_words"><span style="color: #01ee60" title="Количество слов в словаре"><?= $count_words ?></span> / 
                <span style="color: #E53F3F" title="Количество слов для получения следующего статуса"><?= $_SESSION['user']['max_count'] ?></span></p>
        </div>
        <div class="full_profile_and_logout">
                <form action="full_profile.php">
                    <button type="submit" class="logout full_profile_button">Подробная информация</button>
                </form>
                <form action="php/logout.php">
                    <button type="submit" class="logout" onclick="localStorage.clear();">Выйти из профиля</button>
                </form>
            </div>
        
    </div>




    <footer>
        AkkaraQuake &copy;
    </footer>
    <?php 
        // Выводим сообщение об ошибке в случае, если формат фото несоотвествующий
        if (isset($_SESSION["error_photo_extenshion"])) {
            echo '<script>alert("' . $_SESSION["error_photo_extenshion"] . '")</script>';
            unset($_SESSION["error_photo_extenshion"]); 
        }
    ?>
    <script src="js/upload_photo.js"></script>
    <script src="js/location.js"></script>
</body>

</html>