<?php

require 'checkSession.php';

$file = "../data/store.json";
$jsondata = file_get_contents($file);
$data = json_decode($jsondata);

echo "<h3>Add apperal item to store</h3>";

if (empty($data->groups)) {
    echo "Please create a store apperal group first";
    return;
}

echo '        

<input style="width: 300px;" id="item-name" type="text" placeholder="Item name"><br>
<input style="width: 300px;" id="item-price" type="text" placeholder="Item price"><br>
<input style="width: 300px;" id="item-url" type="text" placeholder="Aporia store url to item"><br>
<p>Apperal group</p>
<select id="group-select">';
foreach ($data->groups as $group) {
    echo "<option value='$group->title'>$group->title</option>";
}
echo '</select>
<!--IMAGE UPLOAD-->
<br>
<div id="drop-area-item" style="border: 1px solid black; padding: 10px;">
    <h4>Drag and drop a the apperal item image here.</h4>
        <p style="display:none" id="percentage-item"></p>
    <input type="file" title="Click to select image"><br><br>
</div> 
';

?>