<?php 
    require 'includes/checkSession.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Partners</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/fileUploader.js"></script>
    <script src="js/handlePartners.js"></script>
    <!-- Include the required files -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="team.php">Tean</a>
        <a href="staff.php">Staff</a>
        <a href="store.php">Store</a>
        <a href="partners.php">Partners</a>
    </nav>

    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">
        <h3>New partner</h3>

        <!--IMAGE UPLOAD-->

        <h4>(Step 1). Set the name of the partner here</h4>
        <input style="width: 300px;" id="partner-image-name" type="text" placeholder="Partner name"><br><br>
        <input style="width: 300px;" id="partner-url" type="text" placeholder="Partner website url"><br>

        <div style="display:none" id="drop-area-partner" style="border: 1px solid black;">
            <h4>(Step 2). Drag and drop a banner image for the partner here</h4>
            <p style="display:none" id="percentage-partner"></p>
            <input type="file" title="Click to upload image"><br><br>
        </div> 

        <div style="display:none" id="drop-area-partner2" style="border: 1px solid black;">
            <h4>(Step 3). Drag and drop the partner's logo here</h4>
            <p style="display:none" id="percentage-partner2"></p>
            <input type="file" title="Click to upload image"><br><br>
        </div> 
    </div>
    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>Delete partners</h3>
        <?php require_once 'includes/getPartners.php'; ?>
    </div>
</body>
</html>