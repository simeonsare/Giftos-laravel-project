<!DOCTYPE html>
<html>

<head>

 @include('home.css')
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <!-- Mobile Metas -->
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <!-- Site Metas -->
 <meta name="keywords" content="" />
 <meta name="description" content="" />
 <meta name="author" content="" />
 <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

 <title>
   Giftos
 </title>

 <!-- slider stylesheet -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

 <!-- bootstrap core css -->
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

 <!-- Custom styles for this template -->
 <link href="css/style.css" rel="stylesheet" />
 <!-- responsive style -->
 <link href="css/responsive.css" rel="stylesheet" />


</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
 

    <!-- end header section -->
    <!-- slider section -->


    <div class="hero_area">
        <!-- header section strats -->
@include('home.header')
        <!-- end header section -->
    
      </div>
      <!-- end hero area -->
    
      <!-- why section -->
      <section class="contact_section layout_padding">
        <div class="container px-0">
          <div class="heading_container ">
            <h2 class="">
              Contact Us
            </h2>
          </div>
        </div>
        <div class="container container-bg">
          <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
              <div class="map_container">
                <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
              <form action="#">
                <div>
                  <input type="text" placeholder="Name" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" placeholder="Phone" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    SEND
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>






</body>

</html>