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
        <a href="index.php" class="active">Home</a>
        <a href="news.php">News</a>
        <a href="team.php">Team</a>
        <a href="staff.php">Staff</a>
        <a href="store.php">Store</a>
        <a href="partners.php">Partners</a>
        <a href="../index" style="color:#00A8E7; margin-left:40px;">View website</a>
      <a href="includes/logout.php" style="color:#FF1943; margin-left:40px;">Log out</a>
    </div>
    </nav>
</body>
</html>
