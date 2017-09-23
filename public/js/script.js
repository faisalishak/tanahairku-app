$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});

  // Add smooth scrolling on all links inside the navbar
  $("#myScrollspy a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });

  // Owl-carousel
  $(".owl-carousel").owlCarousel(
    {
      stagePadding: 110,
      margin: 3,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    }
  );
});

$('#zoom_01').ezPlus({
  //zoomType: "inner",
  cursor: "crosshair",
  zoomWindowFadeIn: 500,
  zoomWindowFadeOut: 100,
  borderSize: 1
});

function changeImage(imageId) {
  // console.log(imageId);
  $('#img-large img').attr('src', $('#' + imageId).attr('src'));
  $('#img-large img').attr('id', 'zoom_01-' + imageId);

  $('#zoom_01-' + imageId).ezPlus({
      //zoomType: "inner",
      cursor: "crosshair",
      zoomWindowFadeIn: 500,
      zoomWindowFadeOut: 100,
      borderSize: 1
  });

  $('[data-toggle="tooltip"]').tooltip();  
}
