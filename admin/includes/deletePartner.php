<?php
require 'checkSession.php';

include 'chromeLogger.php';

$file = "../../data/partners.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);

$id = $_POST['id'];

if (!isset($id)) {
    echo false;
    exit;
}

array_splice($data->partners, $id, 1);

$jsondata = json_encode($data, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($file, $jsondata)) {
    echo true;
} else {
    echo "News could not be saved";
}

?>