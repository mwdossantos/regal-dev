<?php
require 'checkSession.php';

include 'chromeLogger.php';

$file = "../../data/teams.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);

$teamId = $_POST['teamId'];
$memberId = $_POST['playerId'];

if (!isset($teamId) || !isset($memberId)) {
    echo false;
    exit;
}
array_splice($data->teams[$teamId]->members, $memberId, 1);

$jsondata = json_encode($data, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($file, $jsondata)) {
    echo true;
} else {
    echo "News could not be saved";
}

?>