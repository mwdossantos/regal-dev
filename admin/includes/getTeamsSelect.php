<?php

include 'chromeLogger.php';

$newsFile = "../data/teams.json";
$jsondata = file_get_contents($newsFile);
$newsData = json_decode($jsondata);

foreach ($newsData->teams as $team) {
    echo "<option value='$team->title'>$team->title</select>";
}   

?>