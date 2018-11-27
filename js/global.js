(function() {
   // our page initialization code here
   // the DOM will be available here
   init();
   twitch();
})();

function init() {
  var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,

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
}

function twitch() {
  new Twitch.Embed("twitch-embed", {
        channel: "regalreserve",
        layout: "video",
        autoplay: false
      });

}