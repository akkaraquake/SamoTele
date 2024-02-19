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
                    href="practice.php">Практика</a>
                <img id="pen" src="images/pen.png" alt="">
            </div>
            <a class="navigation_panel_element" href="sbornik.php">Сборник</a>
            <a class="navigation_panel_element" href="profile.php">Профиль</a>
        </nav>
    </header>

    <div class="main_frame">
        <!--Регистрация-->
        
            <form class="registration_form" action="php/signup.php" method="post">
                <h1>Регистрация</h1>
                <div class="text_fields">
                    <input type="text" name="firstname" placeholder="Имя">
                    <label></label>
                    <input type="text" name="lastname" placeholder="Фамилия">
                    <label></label>
                    <input type="email" name="email" placeholder="Почта">
                    <label>
                        <?php
                                if (isset($_SESSION['email_message'])) {
                                    echo $_SESSION['email_message'];
                                }
                                unset($_SESSION['email_message']);
                            ?>
                    </label>
                    <input type="password"  name="password" placeholder="Пароль">
                    <label></label>
                    <input type="password" name="password_confirm" placeholder="Подтверждение пароля">
                    <label>
                        <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                            }
                            unset($_SESSION['message']);
                        ?>
                    </label> 
                </div>
                <button type="submit" title="Жмяк" name="signup">Зарегистрироваться</button>
                
                <a href="authorization.php" class="ref_to_registration">Авторизация</a>
            </form>
       
        
    </div>

    <footer>AkkaraQuake &copy</footer>


    
</body>

</html>