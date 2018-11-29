<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/fileUploader.js"></script>
    <script src="js/handleStaff.js"></script>
    <!-- Include the required files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="team.php">Tean</a>
        <a href="staff.php">Staff</a>
    </nav>

    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">
        <h3>New staff</h3>

        <!--IMAGE UPLOAD-->

        <h4>(Step 1). Set the name of the staff group here (eg: Executives, OM)</h4>
        <input style="width: 300px;" id="staff-image-name" type="text" placeholder="Staff group name"><br>

        <div style="display:none" id="drop-area-staff" style="border: 1px solid black;">
            <h4>(Step 2). Drag and drop a banner image for staff group here</h4>
            <p style="display:none" id="percentage-staff"></p>
            <input type="file" title="Click to upload image"><br><br>
        </div> 

    </div>


    <div style="display: flex; padding: 10px; flex-direction: column; width: 60%; border: 1px solid black; margin: 10px;">
        <?php require_once 'includes/getNewStaff.php';?>
        



    </div>
</body>
</html>