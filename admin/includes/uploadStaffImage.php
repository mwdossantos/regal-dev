<?php

require 'checkSession.php';

$path = "../../staffImages/";
include 'chromeLogger.php';
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$staffsFile = "../../data/staffs.json";
$jsondata = file_get_contents($staffsFile);
$nameGiven = $_POST['name'];
$imageName = str_replace(" ","",$nameGiven);
$valid_formats = array(
    "jpg",
    "png",
    "gif",
    "bmp",
    "jpeg",
    "JPEG",
    "JPG",
    "PNG",
    "GIF",
    "BMP"
);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];

    if ($size < 50000000) {
    if (strlen($name)) {

        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {

                $actual_image_name = $imageName . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $staffsData = json_decode($jsondata);

                    // Create the article object
                    $staff = (object) [
                        'title' => $nameGiven,
                        'image' => $actual_image_name,
                        'members' => (array) []
                    ];


                    // Push the new article to the array
                    array_push($staffsData->staffs, $staff);

                    $jsondata = json_encode($staffsData, JSON_PRETTY_PRINT);
	   
                    //write json data into data.json file
                    if(file_put_contents($staffsFile, $jsondata)) {
                        echo true;
                    } else {
                        echo false;
                    }
                } else
                    echo false;
        } else
            echo false;
    } else
        echo false;
    exit;
}
}
?>