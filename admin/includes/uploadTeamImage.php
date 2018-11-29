<?php
$path = "../../teamImages/";
include 'chromeLogger.php';

$teamsFile = "../../data/teams.json";
$jsondata = file_get_contents($teamsFile);
$nameGiven = $_POST['name'];
$valid_formats = array(
    "jpg",
    "png",
    "gif",
    "bmp",
    "jpeg"
);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];

    if (strlen($name)) {

        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {

                $actual_image_name = $nameGiven . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $teamsData = json_decode($jsondata);

                    // Create the article object
                    $team = (object) [
                        'title' => $nameGiven,
                        'image' => $actual_image_name,
                        'members' => (array) [

                        ]
                    ];

                    ChromePhp::Log($team);

                    // Push the new article to the array
                    array_push($teamsData->teams, $team);

                    $jsondata = json_encode($teamsData, JSON_PRETTY_PRINT);
	   
                    //write json data into data.json file
                    if(file_put_contents($teamsFile, $jsondata)) {
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