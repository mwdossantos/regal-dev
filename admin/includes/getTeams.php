<?php

require 'checkSession.php';

$file = "../data/teams.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";


if (empty($data->teams)) {
  $html .= '<p>There are no teams yet</p>';

} else {
  $html .= '
  <table style="width:100%">
    <tr>
      <th>Team name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->teams as $key => $team) {
    $html .= '  
    <tr>
    <td>'.$team->title.'</td>
    <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteTeam('.$key.')">Delete</td>
    </tr>
    ';
}

$html .= '</table>';

echo $html;
?> 