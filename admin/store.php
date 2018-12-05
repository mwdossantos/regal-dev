<?php 
    require 'includes/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/fileUploader.js"></script>
    <script src="js/handleStore.js"></script>
    <!-- Include the required files -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="team.php">Team</a>
        <a href="staff.php">Staff</a>
        <a href="store.php">Store</a>
        <a href="partners.php">Partners</a>
    </nav>
    <h3>Store apperal</h3>

    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">

        <h3>Set the store promo image</h3>
        <div id="drop-area-promo" style="border: 1px solid black; padding: 10px;">
            <h4>Drag and drop a the promo image here.</h4>
            <p style="display:none" id="percentage-promo"></p>
            <input type="file" title="Click to select image"><br><br>
        </div> 
    </div>


    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">

        <h3>Create a new apperal group</h3>

        <h4>Pick a name for the apperal group (eg. New apperal, Classics)</h4>
        <input style="width: 300px;" id="group-name" type="text" placeholder="Apperal group name"><br><br>
        <button onclick="saveApperalGroup()">Save apperal group</button>

    </div>


    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">
        <?php require_once 'includes/getApperalGroups.php';?>
    </div>

    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>Delete apperal group</h3>
        <?php require_once 'includes/getApperalGroupsToDelete.php'; ?>
    </div>

    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>Delete apperal item</h3>
        <?php require_once 'includes/getApperalItems.php'; ?>
    </div>

</body>
</html>