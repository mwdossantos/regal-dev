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
      <th>Staff name</th>
      <th>Group name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->staffs as $key => $group) {
    if (!empty($group->members)){
        foreach ($group->members as $key2 => $member) {
            $html .= '  
            <tr>
            <td>'.$member->name.'</td>
            <td>'.$group->title.'</td>
            <td style="background-color: rgba(255,0,0,0.4)" onclick="deleteStaffMember('.$key.', '.$key2.')">Delete</td>
            </tr>
            ';
        }
    }


}

$html .= '</table>';

echo $html;
?> 