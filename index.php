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
    <link rel="stylesheet" href="css/components/block.css" type="text/css">
    <link rel="stylesheet" href="css/components/swiper-custom.css" type="text/css">
    <link rel="stylesheet" href="css/components/twitch.css" type="text/css">

    <!-- API's -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css">
  </head>
  <body>

    <header>
        <div class="left-header-container">
          <img src="css/logo.png" class="home" alt="logo">
        </div>
        <div class="right-header-container">
          <div class="navigation-link home active">Home</div>
          <div class="navigation-link news">News</div>
          <div class="navigation-link team">Team</div>
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

      <!-- Swiper -->
      <div class="swiper-container">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
              <!-- Slides -->
            <?php require_once 'includes/getRecentNews.php'; ?>

          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
      </div>

      <!-- Blocks -->
        <?php require_once 'includes/getIndexItems.php'; ?>
      

      <!-- twitch stream -->

      <h2 class="white big-title twitch-title">See us live</h2>

      <!-- Add a placeholder for the Twitch embed -->
      <div id="twitch-embed" class="iframe-container"></div>
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
      <?php require_once 'includes/getSocials.php'; ?>
    </footer>

    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
            channel: "regalreserve",
            layout: "video",
            autoplay: false,

          });
    </script>

    <!-- jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js"></script>
    <script type="text/javascript">
      var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        autoplay: true,

        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      })
    </script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="js/global.js"></script>
  </body>
</html>
