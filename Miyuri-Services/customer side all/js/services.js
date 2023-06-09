// Smooth scrolling for FAQ links
$('a[href^="#"]').on('click', function(event) {
  event.preventDefault();

  var target = $(this.getAttribute('href'));

  if( target.length ) {
    $('html, body').animate({
        scrollTop: target.offset().top
    }, 1000);
  }
});

