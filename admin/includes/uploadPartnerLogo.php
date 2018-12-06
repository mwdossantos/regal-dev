<?php

require 'checkSession.php';

$path = "../../partnerImages/logos/";
include 'chromeLogger.php';

$file = "../../data/partners.json";
$jsondata = file_get_contents($file);
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

    if (strlen($name)) {

        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {

                $actual_image_name = $imageName . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $data = json_decode($jsondata);

                    foreach ($data->partners as $partner) {
                        if ($partner->title == $nameGiven) {
                            $partner->logo = $actual_image_name;
                        }
                    }

                    $jsondata = json_encode($data, JSON_PRETTY_PRINT);
	   
                    //write json data into data.json file
                    if(file_put_contents($file, $jsondata)) {
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
?>