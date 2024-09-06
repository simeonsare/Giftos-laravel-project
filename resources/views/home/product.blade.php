<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
      @foreach ($product as $products)
   
        <div class="col-sm-6 col-md-4 col-lg-3">
          
              
     
          <div class="box">
            <a href="{{url('/details',$products->id)}}">
              <div class="img-box">
                <img src="Products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$products->title}}
                </h6>
                <div style="align-items: center;">
                  <a  style="border:solid 2px black;" class="btn btn-block" href="{{url('/details',$products->id)}}">Buy</a>
                </div>

                <h6>
                  Price
                  <span>
                   Ksh{{$products->price}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  <a href="{{url('add_cart',$products->id)}}">cart</a>
                </span>
              </div>
            </a>
          </div>
  
        </div>
            @endforeach  
      </div>

      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>