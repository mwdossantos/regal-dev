<html>
  <head>
    <meta charset="uts-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regal Reserve LLC</title>
    <link rel="stylesheet" href="css/colors.css" type="text/css">
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/queries.css" type="text/css">
    <link rel="stylesheet" href="css/placeholders.css" type="text/css">

    <!-- Components -->

    <link rel="stylesheet" href="css/components/header.css" type="text/css">
    <link rel="stylesheet" href="css/components/main.css" type="text/css">
    <link rel="stylesheet" href="css/components/footer.css" type="text/css">
    <link rel="stylesheet" href="css/components/button.css" type="text/css">
    <link rel="stylesheet" href="css/components/team.css" type="text/css">

    <!-- API's -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css">
  </head>
  <body>

    <header>
        <div class="left-header-container">
          <img src="css/logo.png" class="home" alt="logo">
        </div>
        <div class="right-header-container">
          <div class="navigation-link home">Home</div>
          <div class="navigation-link news">News</div>
          <div class="navigation-link team active">Team</div>
          <div class="navigation-link store">Store</div>
          <div class="navigation-link staff">Staff</div>
          <div class="navigation-link partners">Partners</div>
          <div class="divider"></div>
          <div class="button regal-blue mail">
            Contact us
          </div>
        </div>
        <img src="css/swipe-helper.gif" class="swipe-helper" alt="shelper">
    </header>

    <main>

      <!-- team -->
      <?php require_once 'includes/getTeams.php'; ?>

    </main>

    <footer>
      <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
      <img class="logo-text" src="css/logo_text.png" alt="logo">
      <p class="white">We are Gaming. We are Royal. We are Regal.</p>
      <div class="horizontal-divider"></div>
      <div class="socials">
        <img src="css/twitter.png" class="social-icon twitter" alt="social-icon">
        <img src="css/mail.png" class="social-icon mail" alt="social-icon">
        <img src="css/yt.png" class="social-icon yt" alt="social-icon">
      </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="js/global.js"></script>
  </body>
</html>
