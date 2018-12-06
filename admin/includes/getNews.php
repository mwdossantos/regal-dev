<?php

require 'checkSession.php';

$file = "../data/news.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";


if (empty($data->articles)) {
  $html .= '<p>There is no news yet</p>';

} else {
  $html .= '
  <table style="width:100%">
    <tr>
      <th>Title</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->articles as $key => $article) {
    $html .= '
    <tr>
    <td>'.$article->title.'</td>
    <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteArticle('.$key.')">Delete post</td>
    </tr>
    ';
}

$html .= '</table>';

echo $html;
?>
