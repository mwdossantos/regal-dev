<?php
$path = "../../teamImages/logos/";
include 'chromeLogger.php';

$teamsFile = "../../data/teams.json";
$jsondata = file_get_contents($teamsFile);
$nameGiven = $_POST['name'];
$imageName = str_replace(" ","",$nameGiven);
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

                $actual_image_name = $imageName . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $teamsData = json_decode($jsondata);


                    foreach ($teamsData->teams as $team) {
                        if ($team->title == $nameGiven) {
                            $team->logo = $actual_image_name;
                        }
                    }

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