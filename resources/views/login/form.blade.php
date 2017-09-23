<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="css/colorbox.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
    <script>
      $(document).ready(function() {
        $('a.gallery').colorbox({
          opacity: 0.5,
          rel: 'group1'
        });
      });
    </script>
  </head>
  <body>
    <a class='gallery' href='img/testimonials/01.jpg'>Photo_1</a>
    <a class='gallery' href='img/testimonials/02.jpg'>Photo_2</a>
    <a class='gallery' href='img/testimonials/03.jpg'>Photo_3</a>
  </body>
</html>