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
      <th>Player name</th>
      <th>Team name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->teams as $key => $team) {
    if (!empty($team->members)){
        foreach ($team->members as $key2 => $member) {
            $html .= '  
            <tr>
            <td>'.$member->name.'</td>
            <td>'.$team->title.'</td>
            <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteTeamMember('.$key.', '.$key2.')">Delete</td>
            </tr>
            ';
        }
    }


}

$html .= '</table>';

echo $html;
?> 