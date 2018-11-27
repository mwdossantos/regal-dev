(function() {
   // our page initialization code here
   // the DOM will be available here
   listener();
})();

function listener() {
  $('.home').click(function() {
    navigator('index.html',"_self");
  })
  $('.news').click(function() {
    navigator('news.html',"_self");
  })
  $('.team').click(function() {
    navigator('team.html',"_self");
  })
  $('.store').click(function() {
    navigator('store.html',"_self");
  })
  $('.staff').click(function() {
    navigator('staff.html',"_self");
  })
  $('.partners').click(function() {
    navigator('partners.html',"_self");
  })

  $('.twitter').click(function() {
    navigator('https://twitter.com/RegalReserveLLC','_blank');
  })
  $('.mail').click(function() {
    navigator('mailto:andrew@theregalreserve.co', "_self");
  })
  $('.yt').click(function() {
    navigator('https://www.youtube.com/user/teamAeRa','_blank');
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
