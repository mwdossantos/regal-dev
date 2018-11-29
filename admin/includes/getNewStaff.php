<?php
$staffsFile = "../data/staffs.json";
$jsondata = file_get_contents($staffsFile);
$staffData = json_decode($jsondata);
echo "<h3>Create new staff member</h3>";

if (empty($staffData->staffs)) {
    echo "Please create a staff group first";
    return;
}

echo '        
<!--staffS-->
<!--TITLE-->
<input id="member-name" type="text" placeholder="Name">
<br>
<!--TITLE-->
<p>Twitter handle</p>
<input id="member-twitter" type="text" placeholder="@username">
<br>
<!--TITLE-->
<p>Contact email</p>
<input id="member-email" type="text" placeholder="user@email.com">
<br>
<!--TITLE-->
<p>Youtube url</p>
<input id="member-youtube" type="text" placeholder="https://youtube.com/user/">
<br>
<p>Staff group</p>
<select id="staff-select">';

foreach ($staffData->staffs as $staff) {
    echo "<option value='$staff->title'>$staff->title</option>";
}

echo '</select>
<!--IMAGE UPLOAD-->
<br>

<div id="drop-area-member" style="border: 1px solid black; padding: 10px;">
    <h4>Drag and drop a the player image here.</h4>
        <p style="display:none" id="percentage-member"></p>
    <input type="file" title="Click to upload image"><br><br>
</div> 
';

?>