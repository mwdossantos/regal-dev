<?php

require 'checkSession.php';


$path = "../../apperalImages/items/";
include 'chromeLogger.php';

if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

$file = "../../data/store.json";
$jsondata = file_get_contents($file);

$itemName = $_POST['name'];
$imageName = str_replace(" ","",$itemName);
$itemPrice = $_POST['price'];
$itemUrl = $_POST['url'];
$apperalGroup = $_POST['group'];

if (!isset($itemName) && !isset($itemPrice) && !isset($itemUrl) && !isset($apperalGroup)) {
    echo false;
    return;
}
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
    $name = fixFileName($name);
    $size = $_FILES['file']['size'];
    if ($size < 50000000) {

    if (strlen($name)) {

        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {

                $actual_image_name = $imageName . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $data = json_decode($jsondata);

                    // Create the article object
                    $item = (object) [
                        'name' => $itemName,
                        'image' => $actual_image_name,
                        'price' => $itemPrice,
                        'url' => $itemUrl
                    ];

                    foreach ($data->groups as $group) {
                        # code...
                        if ($apperalGroup == $group->title) {
                            array_push($group->items, $item);
                        }
                    }
                    // Push the new article to the array

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
}


function fixFileName ($imagen) {
  $filename=pathinfo($imagen,PATHINFO_FILENAME);
  $ext=pathinfo($imagen,PATHINFO_EXTENSION);

  //replace all these characters with an hyphen
  $repar=array(".",","," ",";","'","\\","\"","/","(",")","?");

  $repairedfilename=str_replace($repar,"-",$filename);
  $cleanfilename=$repairedfilename.".".strtolower($ext);

  return $cleanfilename;
}
?>
