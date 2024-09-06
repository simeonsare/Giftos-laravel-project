<!DOCTYPE html>
<html>

<head>

 @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('home.product')



  <!-- end shop section -->







  <!-- contact section -->
  @include('home.contact')



  <!-- end contact section -->

   

  <!-- info section -->
  <script>
    $(document).ready(function () {
        // Initialize the carousel
        $('#carouselExampleIndicators').carousel({
            interval: 5000, // Time between slides (5 seconds)
            pause: 'hover', // Pause on mouse hover
            wrap: true      // Loop around when reaching the end
        });

        // Optionally, you can add custom control for the products slide
        $('.carousel-control-prev').click(function () {
            $('#carouselExampleIndicators').carousel('prev');
        });

        $('.carousel-control-next').click(function () {
            $('#carouselExampleIndicators').carousel('next');
        });
    });
</script>

@include('home.footer')


</body>

</html>