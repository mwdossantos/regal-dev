<?php
$teamsFile = "../data/teams.json";
$jsondata = file_get_contents($teamsFile);
$teamData = json_decode($jsondata);
echo "<h3>Create new team member</h3>";

if (empty($teamData->teams)) {
    echo "Please create a team first";
    return;
}

echo '        
<!--TEAMS-->
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
<p>Game</p>
<select id="team-select">';

foreach ($teamData->teams as $team) {
    echo "<option value='$team->title'>$team->title</option>";
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