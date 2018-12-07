<?php
require 'checkSession.php';

include 'parsedown.php';
include 'chromeLogger.php';

$Parsedown = new Parsedown();

$path = "../../newsImages/";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$newsFile = "../../data/news.json";
$jsondata = file_get_contents($newsFile);
$newsData = json_decode($jsondata);

$title = $_POST['title'];
$body = $_POST['body'];
$author = $_POST['author'];
$headlineImage = $_POST['headlineImage'];

//$newsImage = $_POST['newsImage'];
$date = date("l") . " " . date("F") . " " . date("w") . ", " .  date("Y") . ".";

if (!isset($title) && !isset($body) && !isset($author)) {
    echo false;
    exit;
}

if (!isset($headlineImage)) {
    $headlineImage = "css/news.JPG";
} else {
    //find the headline image 
    foreach ($newsData->images as $image) {
        $imageWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image);
        if ($imageWithoutExt == $headlineImage) {
            $headlineImage = $image;
        }
    }
}


$imageNames = getStringsBetween($body, 'img[', ']img');

// Replace the custom image tags with actual HTML images
foreach ($imageNames as $imageName) {
    # code...
    foreach ($newsData->images as $image) {
        # code...

        $imageWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image);
        if ($imageWithoutExt == $imageName) {

            $body = str_replace_first("img[","<img class='news-content-image' alt='$imageName' src='newsImages/".$image."'",$body);
            $body = str_replace_first("]img","/>",$body);
        }
    }
}

// Parse the markdown to html
$parsedBody = $Parsedown->text($body);

// Create the article object
$article = (object) [
    'title' => $title,
    'body' => $parsedBody,
    'date' => $date,
    'newsImage' => $headlineImage,
    'author' => $author
];


// Push the new article to the array
array_push($newsData->articles, $article);

// Encode the json data
$jsondata = json_encode($newsData, JSON_PRETTY_PRINT);

//write json data into data.json file
if(file_put_contents($newsFile, $jsondata)) {
    echo true;
} else {
    echo "News article could not be saved";
}

// Formatting functions
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function str_replace_first($from, $to, $content)
{
    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $content, 1);
}

function getStringsBetween($str, $startDelimiter, $endDelimiter) {
    $contents = array();
    $startDelimiterLength = strlen($startDelimiter);
    $endDelimiterLength = strlen($endDelimiter);
    $startFrom = $contentStart = $contentEnd = 0;
    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
      $contentStart += $startDelimiterLength;
      $contentEnd = strpos($str, $endDelimiter, $contentStart);
      if (false === $contentEnd) {
        break;
      }
      $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
      $startFrom = $contentEnd + $endDelimiterLength;
    }
  
    return $contents;
  }
  
?>