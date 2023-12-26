<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
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
        <!--Авторизация-->
        <form class="registration_form" action="php/signin.php" method="post">
            <h1>Авторизация</h1>
            <div class="text_fields">
                <input type="email" name="email" placeholder="Почта">
                <label></label>
                <input type="password" name="password" placeholder="Пароль">
                <label>
                    <?php
                        if (isset($_SESSION['auth_message'])) {
                            echo $_SESSION['auth_message'];
                        }
                        unset($_SESSION['auth_message']);
                    ?>
                </label>
            </div>
            <button type="submit" title="Жмяк" name="signup">Войти</button>
            <a href="registration.php" class="ref_to_registration">Регистрация</a>
        </form>
        
        
    </div>

    <footer>AkkaraQuake &copy</footer>


    
</body>

</html>