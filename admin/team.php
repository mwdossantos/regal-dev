<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Teams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/fileUploader.js"></script>
    <script src="js/handleTeams.js"></script>
    <!-- Include the required files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="team.php">Team</a>
    </nav>

    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>New team</h3>

        <!--IMAGE UPLOAD-->

        <h4>Set the name of the game here (eg: fortnite, csgo)</h4>
        <input style="width: 300px;" id="team-image-name" type="text" placeholder="Image name as used as team header"><br>

        <div style="display:none" id="drop-area-team" style="border: 1px solid black;">
            <h4>Drag and drop a banner image for the game here to save the team.</h4>
            <input type="file" title="Click to upload image"><br><br>
        </div> 


    </div>


    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>New member</h3>

        <!--TEAMS-->
        <!--TITLE-->
        <input id="member-name" type="text" placeholder="Name">
        <br>
        <!--TITLE-->
        <input id="member-twitter" type="text" placeholder="@username">
        <br>
        <!--TITLE-->
        <input id="member-email" type="text" placeholder="user@email.com">
        <br>
        <!--TITLE-->
        <input id="member-youtube" type="text" placeholder="https://youtube.com/user/">
        <br>
        <select id="team-select">
            <?php require_once 'includes/getTeamsSelect.php';?>
        </select>
        <!--IMAGE UPLOAD-->
        <br>

        <div id="drop-area-member" style="border: 1px solid black;">
            <h4>Drag and drop a banner image for the game here to save the member.</h4>
            <input type="file" title="Click to upload image"><br><br>
        </div> 
        <br>

        <button onclick="saveTeamMember()">Create new team member</button>


    </div>
</body>
</html>