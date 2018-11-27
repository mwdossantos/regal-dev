(function() {
   // our page initialization code here
   // the DOM will be available here
   listener();
})();

function listener() {
  $('.home').click(function() {
    navigator('index.html');
  })
  $('.news').click(function() {
    navigator('news.html');
  })
  $('.team').click(function() {
    navigator('team.html');
  })
  $('.store').click(function() {
    navigator('store.html');
  })
  $('.staff').click(function() {
    navigator('staff.html');
  })
  $('.partners').click(function() {
    navigator('partners.html');
  })
}

function navigator(destination) {
  window.location.href = destination;
}
