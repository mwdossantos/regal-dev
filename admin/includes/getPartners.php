<?php

require 'checkSession.php';

$file = "../data/partners.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);
$html = "";


if (empty($data->partners)) {
  $html .= '<p>There are no partners</p>';

} else {
  $html .= '
  <table style="width:100%">
    <tr>
      <th>Partner name</th>
      <th>Delete</th>
    </tr>
  ';
}

foreach ($data->partners as $key => $partner) {
    $html .= '  
    <tr>
    <td>'.$partner->title.'</td>
    <td style="background-color: rgba(255,0,0,0.4)" onclick="deletePartner('.$key.')">Delete</td>
    </tr>
    ';
}

$html .= '</table>';

echo $html;
?> 