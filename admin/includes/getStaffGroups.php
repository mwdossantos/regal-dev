<?php

require 'checkSession.php';

$file = "../data/staffs.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";


if (empty($data->staffs)) {
  $html .= '<p>There are no staff groups yet</p>';

} else {
  $html .= '
  <table style="width:100%">
    <tr>
      <th>Group name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->staffs as $key => $group) {
    $html .= '  
    <tr>
    <td>'.$group->title.'</td>
    <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteStaffGroup('.$key.')">Delete</td>
    </tr>
    ';
}

$html .= '</table>';

echo $html;
?> 