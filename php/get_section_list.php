<?php
    session_start();
    require_once 'connect.php';

    $id = $_SESSION['user']['id'];

    $section_list = [];

    $get_section_list = mysqli_query($connect, "SELECT `section_name` FROM `sections` WHERE user_id = '$id'");

    while ($section = mysqli_fetch_assoc($get_section_list)) {
        $section_list[] = $section['section_name'];
    }

    echo json_encode($section_list, JSON_UNESCAPED_UNICODE);
?>