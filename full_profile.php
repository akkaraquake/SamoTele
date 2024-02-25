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
                        href="practice.php">Практика</a>
                    <img id="pen" src="images/pen.png" alt="">
                </div>
                <a class="navigation_panel_element" href="sbornik.php">Сборник</a>
                <a class="navigation_panel_element" href="profile.php">Профиль</a>
            </nav>
        </header>

        <div class="main_frame main_frame_fp">
            <!--Содержимое окна после нажатия кнопки "Подробная информация"-->
            <div class="avatar_and_name avatar_and_name_fp">
                <img id="change_avatar" class="avatar_image avatar_image_fp" src="images/avatar_frame.png" title="Кликните дважды, чтобы изменить фото">
                <div class="oval_avatar oval_avatar_fp">
                    <!-- Реализация загрузки фото -->
                    <?php
                        if ($_SESSION['user']['avatar'] !== null):

                            // Загружаем фото из базы данных и добавляем невидимую форму в случае, если нужно заменить фото
                            echo '<img src="' . $_SESSION['user']['avatar'] . '" class="oval_avatar_image oval_avatar_image_fp">
                            <form action="php/send_photo.php" method="post" enctype="multipart/form-data" class="send_photo_form" style="display:none">
                                <img src="images/upload_icon.png" alt="Иконка загрузки"><br/>
                                <input type="file" id="upload_avatar" name="avatar" hidden>
                                <label id="upload_avatar_btn" class="upload_avatar_label">Загрузить фото</label>
                                <button id="hidden_submit_btn" type="submit" hidden></button>  
                            </form> ';
                            
                        else:
                    ?>
                            <form action="php/send_photo.php" method="post" enctype="multipart/form-data" class="send_photo_form send_photo_form_fp">
                                <img src="images/upload_icon.png" alt="Иконка загрузки"><br/>
                                <input type="file" id="upload_avatar" name="avatar" hidden>
                                <label id="upload_avatar_btn" class="upload_avatar_label">Загрузить фото</label>
                                <button id="hidden_submit_btn" type="submit" hidden></button>
                                
                            </form> 
                    <?php endif; ?>
                </div>
                <input type="text" oninput="change_names();" id="lastname_hidden" name="lastname_hidden" class="fullname fullname_fp" value="<?= ($_SESSION['user']['lastname'])?>" placeholder="Фамилия"> <br>
                <input type="text" oninput="change_names();" id="firstname_hidden" class="fullname fullname_fp" value="<?= ($_SESSION['user']['firstname'])?>" placeholder="Имя">
                    
                
            </div>

            <div class="full_info">
                <p class="full_info_label">Подробная информация</p>
                <div class="message_panel">
                    <?php
                        if (isset($_SESSION['message'])) {
                            if (($_SESSION['message'] == "Заполните все поля!") || ($_SESSION['message'] == "Пароли не совпадают!") || 
                                ($_SESSION['message'] == "Введенная почта зарегистрирована!")) {
                                echo '<p class="failed_update">' . $_SESSION['message'] . ' ' . '</p>';
                            }
                            elseif ($_SESSION['message'] == "Данные успешно изменены!") {
                                echo '<p class="success_update">' . ' ' . $_SESSION['message'] . '</p>';
                            }
                            unset($_SESSION['message']);
                        }
                    ?>
                </div>

                <form id="full_info_form" action="php/send_full_info.php" class="info_list" method="post">
                    <input type="text" id="lastname" name="lastname" style="display: none;" value="<?= ($_SESSION['user']['lastname'])?>">
                    <input type="text" id="firstname" name="firstname" style="display: none;" value="<?= ($_SESSION['user']['firstname'])?>">
                    <label>Дата рождения: <input type="date" name="birth_date" value="<?= isset($_SESSION['user']['birth_date']) ? $_SESSION['user']['birth_date'] : ""?>"></label>
                    <label>Дата создания профиля: <input value="<?=$_SESSION['user']['create_date']?>" style="background-color: white;" disabled></label>
                    <label>Почта: <input class="email_fp" type="email" value="<?=$_SESSION['user']['email']?>" name="email"></label>
                    <label>Пароль: 
                        <div class="password">
                            <input id="password_input" type="password" value="<?=$_SESSION['user']['password']?>" style="background-color: white;" disabled>
                            <a href="#" onclick="show_hide_password(document.getElementById('password_input'));"><img src="images/eye_icon.png"></a>
                        </div>    
                    </label>
                    <p class="change_password" hidden>Изменить пароль</p>
                    <label>Новый пароль: 
                        <div class="password">
                            <input id="new_password_input" type="password" class="input_new_password" name="new_password" onfocus="document.getElementById('new_password_eye_icon').removeAttribute('hidden')">
                            <a id="new_password_eye_icon" href="#" onclick="show_hide_password(document.getElementById('new_password_input'));" hidden><img src="images/eye_icon.png"></a>
                        </div>
                    </label>
                    <label>Подтверждение нового пароля: 
                        <div class="password">
                            <input id="new_password_input_confirm" type="password" class="input_new_password" name="new_password_confirm" onfocus="document.getElementById('new_password_confirm_eye_icon').removeAttribute('hidden')">
                            <a id="new_password_confirm_eye_icon" href="#" onclick="show_hide_password(document.getElementById('new_password_input_confirm'));" hidden><img src="images/eye_icon.png"></a>
                        </div>
                    </label>
                    
                </form>
                <div class="full_profile_and_logout full_profile_and_logout_fp">
                        <form>
                            <button type="submit" form="full_info_form" class="logout full_profile_button">Сохранить</button>
                            
                        </form>
                        <form class="back" action="profile.php">
                            <button type="submit" class="logout">&lt;&lt; Назад</button>
                        </form>
                </div>
                
                
            </div>
        </div>




        <footer>
            AkkaraQuake &copy;
        </footer>
        <script src="upload_photo.js"></script>
        <script>
            function show_hide_password(input){
                if (input.getAttribute('type') == 'password') {
                    input.setAttribute('type', 'text');
                } else {
                    input.setAttribute('type', 'password');
                }
            }
        </script>
        <script>
            function change_names() {
                var firstname_hidden = document.getElementById('firstname_hidden');
                var lastname_hidden = document.getElementById('lastname_hidden');
                var firstname = document.getElementById('firstname');
                var lastname = document.getElementById('lastname');

                firstname.value = firstname_hidden.value;
                lastname.value = lastname_hidden.value;

            }    
        </script>
        <?php 
            // Выводим сообщение об ошибке в случае, если формат фото несоотвествующий
            if (isset($_SESSION["error_photo_extenshion"])) {
                echo '<script>alert("' . $_SESSION["error_photo_extenshion"] . '")</script>';
                unset($_SESSION["error_photo_extenshion"]); 
            }
        ?>
        <script src="js/location.js"></script>
        <script src="js/upload_photo.js"></script>
    </body>

</html>