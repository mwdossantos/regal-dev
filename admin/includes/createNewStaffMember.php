<?php

require 'checkSession.php';


$path = "../../staffImages/members/";
include 'chromeLogger.php';
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$staffsFile = "../../data/staffs.json";
$jsondata = file_get_contents($staffsFile);

$memberName = $_POST['name'];
$imageName = str_replace(" ","",$memberName);

$gameName = $_POST['gameName'];
$twitterHandle = $_POST['twitterHandle'];
$emailHandle = $_POST['emailHandle'];
$youtubeHandle = $_POST['youtubeHandle'];

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
                    $member = (object) [
                        'name' => $memberName,
                        'image' => $actual_image_name,
                        'twitterHandle' => $twitterHandle,
                        'emailHandle' => $emailHandle,
                        'youtubeHandle' => $youtubeHandle
                    ];

                    foreach ($staffsData->staffs as $staff) {
                        # code...
                        if ($gameName == $staff->title) {
                            array_push($staff->members, $member);
                        }
                    }
                    // Push the new article to the array

                    $jsondata = json_encode($staffsData, JSON_PRETTY_PRINT);
	   
                    //write json data into data.json file
                    if(file_put_contents($staffsFile, $jsondata)) {
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