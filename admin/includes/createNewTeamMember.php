<?php
$path = "../../teamImages/members/";
include 'chromeLogger.php';

$teamsFile = "../../data/teams.json";
$jsondata = file_get_contents($teamsFile);

$gameName = $_POST['gameName'];
$memberName = $_POST['name'];
$twitterHandle = $_POST['twitterHandle'];
$emailHandle = $_POST['emailHandle'];
$youtubeHandle = $_POST['youtubeHandle'];
ChromePhp::Log($gameName);

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

                $actual_image_name = $memberName . "." . $ext;
                $tmp = $_FILES['file']['tmp_name'];
                if (move_uploaded_file($tmp, $path . $actual_image_name)) {

                    // converts json data into array
                    $teamsData = json_decode($jsondata);

                    // Create the article object
                    $member = (object) [
                        'name' => $memberName,
                        'image' => $actual_image_name,
                        'twitterHandle' => $twitterHandle,
                        'emailHandle' => $emailHandle,
                        'youtubeHandle' => $youtubeHandle
                    ];

                    ChromePhp::Log($member);

                    foreach ($teamsData->teams as $team) {
                        # code...
                        if ($gameName == $team->title) {
                            array_push($team->members, $member);
                        }
                    }
                    // Push the new article to the array

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