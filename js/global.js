(function() {
   // our page initialization code here
   // the DOM will be available here
   listener();
   animations();
})();

function listener() {
  $('.home').click(function() {
    navigator('index',"_self");
  })
  $('.news').click(function() {
    navigator('news',"_self");
  })
  $('.team').click(function() {
    navigator('team',"_self");
  })
  $('.store').click(function() {
    navigator('store',"_self");
  })
  $('.staff').click(function() {
    navigator('staff',"_self");
  })
  $('.partners').click(function() {
    navigator('partners',"_self");
  })
  
  $('.aporia').click(function() {
    navigator('https://aporiacustoms.com/','_blank');
  })
  $('.aukey').click(function() {
    navigator('https://www.aukey.com/','_blank');
  })
  $('.perform').click(function() {
    navigator('https://www.beaperformer.com/','_blank');
  })

}

function navigator(destination, where) {
  window.open(destination, where);
}

function animations() {

  //global animations

  ScrollReveal().reveal('header', {
    delay: 200,
    distance: '300px',
    origin: 'top',
  });

  ScrollReveal().reveal('.left-header-container', {
    delay: 600,
    distance: '300px',
    origin: 'right',
  });

  ScrollReveal().reveal('.right-header-container', {
    delay: 600,
    distance: '20px',
    origin: 'top',
  });

  ScrollReveal().reveal('footer', {
    delay: 400,
    distance: '100px',
    origin: 'bottom',
  });

  //partners animations

  ScrollReveal().reveal('.partner-item', {
    delay: 400,
    interval:300,
    distance: '300px',
    origin: 'bottom',
  });


  //store animations

  ScrollReveal().reveal('.promo-row', {
    delay: 400,
    distance: '300px',
    origin: 'left',
  });

  ScrollReveal().reveal('.store-title', {
    delay: 600,
    distance: '100px',
    origin: 'bottom',
  });

  ScrollReveal().reveal('.store-item-container', {
    delay: 600,
    interval:300,
    distance: '100px',
    origin: 'bottom',
  });

  //team / staff animations

  ScrollReveal().reveal('.dots', {
    delay: 400,
    distance: '100px',
    origin: 'bottom',
  });

  ScrollReveal().reveal('.team-container', {
    delay: 400,
    distance: '100px',
    origin: 'bottom',
  });

  // ScrollReveal().reveal('.team-member-container', {
  //   interval:300,
  //   distance: '100px',
  //   origin: 'bottom',
  // });

  //news animations

  ScrollReveal().reveal('.news-image', {
    delay: 400,
    distance: '100px',
    origin: 'bottom',
  });

  ScrollReveal().reveal('.news-content', {
    delay: 600,
    distance: '100px',
    origin: 'bottom',
  });

  //home animations
  ScrollReveal().reveal('.swiper-container', {
    delay: 400,
    distance: '300px',
    origin: 'left',
  });

  ScrollReveal().reveal('.block-row', {
    delay: 600,
    distance: '300px',
    origin: 'right',
  });

  ScrollReveal().reveal('.twitch-title', {
    delay:800,
    distance: '100px',
    origin: 'bottom',
  });

  ScrollReveal().reveal('#twitch-embed', {
    delay:800,
    distance: '100px',
    origin: 'bottom',
  });


}
