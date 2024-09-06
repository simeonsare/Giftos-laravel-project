<section class="slider_section">
  <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">

              <!-- First Slide: Welcome Message -->
              <div class="carousel-item active">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-7">
                              <div class="detail-box">
                                  <h1>
                                      Welcome To Our <br>
                                      Online Gift Shop
                                  </h1>
                                  <p>
                                      Discover a wide range of delightful gifts for every occasion. Whether you're looking for the perfect present for a loved one or treating yourself, our shop has something special for everyone.
                                  </p>
                                  <a href="#">
                                      Start Shopping
                                  </a>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="img-box">
                                  <img style="width:600px" src="images/image3.jpeg" alt="Welcome Image" />
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Loop through the products and create slides -->
              @foreach($products as $product)
                  <div class="carousel-item">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-md-7">
                                  <div class="detail-box">
                                      <h1>{{ $product->title }}</h1>
                                      <p>{{ $product->description }}</p>
                                   
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <div >
                                      <img style="width:150px" src="{{ asset('Products/' . $product->image) }}" alt="{{ $product->title }}" />
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>

          <!-- Carousel controls -->
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>
  </div>
</section>
