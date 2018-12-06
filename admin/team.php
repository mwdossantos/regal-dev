<?php
    require 'includes/checkSession.php';
?>

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
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/queries.css" type="text/css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
<body>
  <nav>
    <img src="css/CMSquad.png">
    <div class="nav-container">
      <a href="index.php">Home</a>
      <a href="news.php">News</a>
      <a href="team.php" class="active">Team</a>
      <a href="staff.php">Staff</a>
      <a href="store.php">Store</a>
      <a href="partners.php">Partners</a>
      <a href="#" style="color:#00A8E7; margin-left:40px;">View website</a>
      <a href="#" style="color:#FF1943; margin-left:40px;">Log out</a>
    </div>
  </nav>

    <div class="field-container">
        <h3>New team</h3>

        <!--IMAGE UPLOAD-->

        <h4>(Step 1). Set the name of the game here (eg: fortnite, csgo)</h4>
        <input style="width: 300px;" id="team-image-name" type="text" placeholder="Image name as used as team header">

        <div style="display:none" id="drop-area-team" style="border: 1px solid black;">
            <h4>(Step 2). Drag and drop a banner image for the game here to save the team.</h4>
            <p style="display:none" id="percentage-team"></p>
            <input type="file" title="Click to upload image">
        </div>

        <div style="display:none" id="drop-area-team2" style="border: 1px solid black;">
            <h4>(Step 3). Drag and drop the game logo here</h4>
            <p style="display:none" id="percentage-team2"></p>
            <input type="file" title="Click to upload image">
        </div>

    </div>


    <div class="field-container">
        <?php require_once 'includes/getNewMember.php';?>
    </div>

    <div class="field-container">
        <h3>Delete teams</h3>
        <?php require_once 'includes/getTeams.php'; ?>
    </div>

    <div class="field-container">
        <h3>Delete team members</h3>
        <?php require_once 'includes/getTeamMembers.php'; ?>
    </div>
</body>
</html>
