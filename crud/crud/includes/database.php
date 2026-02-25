<?php
    $db = mysqli_connect('localhost', 'root', '', 'crud');

    if(!$db) {
        echo "Hubo un error";
        exit;
    }