<?php
    $connect = mysqli_connect('localhost', 'root', '', 'SamoTele');

    if (!$connect) {
        die("Connection error! :(");
    }