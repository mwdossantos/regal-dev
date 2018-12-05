<?php

if (session_status() != 2) {
    session_start();
}

if (!isset($_SESSION["hgfhrhfgdgmjeghdfgbfdngfjsrkumhjcgngfjn"])) {
    session_destroy();
    header('Location: login.php');

    exit;
}