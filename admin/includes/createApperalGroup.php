<?php

require 'checkSession.php';


$path = "../../apperalImages/";
include 'chromeLogger.php';

$file = "../../data/store.json";
$jsondata = file_get_contents($file);
$nameGiven = $_POST['name'];

$data = json_decode($jsondata);

// Create the article object
$group = (object) [
    'title' => $nameGiven,
    'items' => (array) []
];

// Push the new apperal group
array_push($data->groups, $group);

$jsondata = json_encode($data, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($file, $jsondata)) {
    echo true;
} else {
    echo "Image could not be uploaded.";
}
?>