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
      <a href="news.php" class="active">News</a>
      <a href="team.php">Team</a>
      <a href="staff.php">Staff</a>
      <a href="store.php">Store</a>
      <a href="partners.php">Partners</a>
      <a href="../index" style="color:#00A8E7; margin-left:40px;">View website</a>
      <a href="includes/logout.php" style="color:#FF1943; margin-left:40px;">Log out</a>
    </div>
  </nav>

    <div class="field-container">
        <h3>Create news post</h3>

        <!--IMAGE UPLOAD-->

        <h4>Add images, one at the time</h4>
        <input style="width: 300px;" id="image-name" type="text" placeholder="Image name as used in article">

        <div style="display:none" id="drop-area" style="border: 1px solid black;">
            <h3>Drag and Drop images Here</h3>
            <input type="file" title="Click to add Files"><br><br>
        </div>
        <div style="display:none" id="uploaded-images-div"><p>Uploaded images</p><ul id="uploaded-images"></ul></div>

        <!--TITLE-->
        <input id="news-headlineImage" type="text" placeholder="Headline image - name of image specified above">

        <input id="news-title" type="text" placeholder="Article title">
        <!--BODY-->
        <textarea id="news-body" cols="30" rows="10" placeholder="Article"></textarea>

        <!--AITHOR-->
        <input id="news-author" type="text" placeholder="Author">


        <button onclick="saveNewsArticle()">Publish news article</button>

    </div>


    <div class="remove-container">
        <?php require_once 'includes/getNews.php'; ?>
    </div>
</body>
</html>
