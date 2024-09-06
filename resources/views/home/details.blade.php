<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giftos &mdash; {{$product->title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/fl-bigmug-line.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @include('home.css')
    <style>
        img {

  object-fit: contain;
}
    </style>

</head>
<body>
    @include('home.header')

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Product Details of</span>
                    <h1 class="mb-2">{{$product->title}}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{$product->price}}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            <div><img src="/Products/{{ $product->image }}"alt="Image" class="img-fluid"     style="width: 609px;height:380px"></div>
                            @if ($product->gallery_1 )
                            <div><img src="/Products/{{ $product->gallery_1 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_2 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_3 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_4 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_5 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_6 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_7 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                            <div><img src="/Products/{{ $product->gallery_8 }}"alt="Image" class="img-fluid" style="width: 609px;height:380px"></div>
                                
                            @else
                                
                            @endif
                    
                       
                        </div>

                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">ksh{{$product->price}}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">version</span>
                                        <span class="property-specs-number">{{$product->version}} <sup>+</sup></span>
                                    </li>
                                    <li>
                                        <span class="property-specs">size</span>
                                        <span class="property-specs-number">{{$product->size}}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Delivery </span>
                                        <span class="property-specs-number" style="color: green">{{$product->delivery}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Category</span>
                                <strong class="d-block">{{$product->category}}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year</span>
                                <strong class="d-block">{{$product->year}}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Delivery price</span>
                                <strong class="d-block">ksh{{$product->delivery_m}}</strong>
                            </div>
                        </div>
              
                         

                        @if ($product->gallery_1)
                                               <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_1.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_1 }}" alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_2.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_2 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_3.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_3 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_4.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_4 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_5.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_5 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_6.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_6 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_7.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_7 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="images/img_8.jpg" class="image-popup gal-item"><img src="/Products/{{ $product->gallery_8 }}"alt="Image" alt="Image" class="img-fluid"></a>
                            </div>
                        </div>   
                        @else
                            
                        @endif
  
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

 
                        {{-- <form action="" class="form-contact-agent">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                            </div>
                        </form> --}}
                    </div>

                    <div style="border-bottom:solid slategray" class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Details</h3>          

              
                        <p>{{$product->description}} </p>
                        
                    </div>
                    <div class="new">
                        <span>
                          <a class="btn btn-secondary" href="{{url('add_cart',$product->id)}}">Add To Cart</a>
                          <a style="margin: 10px" class="btn btn-success" href="{{url('buy_details',$product->id)}}">Buy</a>
                        </span>
                      </div>

                      <div class="new">
                        <span>
                          
                        </span>
                      </div>

                </div>
 

            </div>
        </div>
    </div>
{{-- 
@include('home.footer') --}}

</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.slide-one-item').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText : ["<span class='icon-arrow_back'></span>","<span class='icon-arrow_forward'></span>"]
        });
    });
</script>

</body>
</html>
