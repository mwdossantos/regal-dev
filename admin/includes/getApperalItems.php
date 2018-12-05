<?php

require 'checkSession.php';

$file = "../data/store.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";


if (empty($data->groups)) {
  $html .= '<p>There are no apperal groups yet</p>';

} else {
  $html .= '
  <table style="width:100%">
    <tr>
      <th>Apperal item name</th>
      <th>Group name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->groups as $key => $group) {
    if (!empty($group->items)){
        foreach ($group->items as $key2 => $item) {
            $html .= '  
            <tr>
            <td>'.$item->name.'</td>
            <td>'.$group->title.'</td>
            <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteApperalItem('.$key.', '.$key2.')">Delete</td>
            </tr>
            ';
        }
    }


}

$html .= '</table>';

echo $html;
?> 