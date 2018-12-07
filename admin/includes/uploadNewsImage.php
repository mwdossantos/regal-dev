<?php

require 'checkSession.php';

$path = "../../newsImages/";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$newsFile = "../../data/news.json";
$jsondata = file_get_contents($newsFile);
$nameGiven = $_POST['name'];
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

                $actual_image_name = $nameGiven . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $newsData = json_decode($jsondata);

                    // Push image name to array
                    array_push($newsData->images, $actual_image_name);

                    $jsondata = json_encode($newsData, JSON_PRETTY_PRINT);
	   
                    //write json data into data.json file
                    if(file_put_contents($newsFile, $jsondata)) {
                         echo true;
                    } else {
                        echo "Image could not be uploaded.";
                    }
                } else
                    echo "failed";
        } else
            echo "Invalid file format..";
    } else
        echo "Please select image..!";
    exit;
}
}
?>