<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{url('/')}}">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/why')}}">
              Why Us
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
          </li>
        </ul>
        <div class="user_option">
          @if (Route::has('login'))
          @auth
              
   
{{-- TO DO--}}
{{-- make cart view  --}}    

          @if (Route::has('details/{id}'))
                <form class="form-inline ">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
          <br>
          @else
         <a href="{{url('/mycart')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            {{$count}}
          </a>   
          <a href="{{url('/myorders')}}">
            <i class="fa fa-shopping-bag" aria-hidden="true"> <strong><sup> {{$count1}}</sup></strong>     Orders</i>
           
          </a>   

 
          @endif


          <form style="padding: 20px" method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
        {{ Auth::user()->name }}
          @else

          <a href="{{url ('/login')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>
          <a href="{{url ('/register')}}">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>
              register
            </span>
          </a>
       @endauth
       @endif
        </div>
      </div>
    </nav>
  </header>