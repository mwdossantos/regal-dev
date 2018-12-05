<?php

include 'chromeLogger.php';
$username = "admin";
$password = "password";


if (isset($_POST["username"]) && isset($_POST["password"])) {

    if ($_POST["username"] == $username && $_POST["password"] == $password) {

        session_start();
        $_SESSION['hgfhrhfgdgmjeghdfgbfdngfjsrkumhjcgngfjn'] = true;
        header('Location: ../index.php');
    }
} else {
    session_start();
    session_destroy();
    return false;
}
