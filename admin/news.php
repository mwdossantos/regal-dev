<?php 
    require 'includes/checkSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - News Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/fileUploader.js"></script>
    <script src="js/handleNewsArticles.js"></script>
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

    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>Create new news post</h3>

        <!--IMAGE UPLOAD-->

        <h4>Add images, one at the time</h4>
        <input style="width: 300px;" id="image-name" type="text" placeholder="Image name as used in article"><br>

        <div style="display:none" id="drop-area" style="border: 1px solid black;">
            <h3>Drag and Drop images Here</h3>
            <input type="file" title="Click to add Files"><br><br>
        </div> 
        <div style="display:none" id="uploaded-images-div"><p>Uploaded images</p><ul id="uploaded-images"></ul></div>

        <br>

        <!--TITLE-->
        <input id="news-headlineImage" type="text" placeholder="Headline image"><br><br>

        <input id="news-title" type="text" placeholder="Article title">
        <br>
        <!--BODY-->
        <textarea id="news-body" cols="30" rows="10" placeholder="Article"></textarea>

        <br>
        <!--AITHOR-->
        <input id="news-author" type="text" placeholder="Author">
        <br>
        
        <!--PRIVACY-->
        <p>Public?</p>
        <select id="news-privacy">
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
        <br>
        <button onclick="saveNewsArticle()">Save news aricle</button>

    </div>


    <div style="display: flex; flex-direction: column; width: 60%;">
        <h3>Delete news articles</h3>
        <?php require_once 'includes/getNews.php'; ?>
    </div>
</body>
</html>