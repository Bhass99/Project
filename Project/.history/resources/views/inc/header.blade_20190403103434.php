<header>
    <div class="gray-balk">
        <div class="container">
            @guest
                <div class="gray-balk-text">
                    <a class="credentials" href="#popup1">Login |</a>
                    <a class="credentials" href="#popup2">Nog geen account? registreer dan hier!</a>   
                </div>
                @else
                <div class="loged-in">
                    <a class="float-right  credentials" href="{{ route('logout') }}"
                        style="text-decoration: none"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>    
                    <p class="credentials">Welkom, {{ Auth::user()->name }}</p> <span class="caret"></span>
                </div>
            @endguest
        </div>
    </div>
    <nav>
        <div class="logo">
            <img class="image" src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg">
            <img class="image-mobile" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >
            <i class="fa fa-bars fa-2x" id="hamburger"></i>
        </div>
        <div class="nav-links" id="menu">
            <ul class="nav-links-list">
                <li><a href="#home">Home</a></li>
                <li><a href="#home">Kalender</a></li>
                <li><a href="#home">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>
@section('extra-js')
    <script>
        $('#hamburger').click(() => {
            $('#menu').toggleClass('show')
            $('#hamburger').toggleClass('show')
        })
        $('.nav-links-list li a').click(() => {
            $('#hamburger').removeClass('show')
            $('#menu').removeClass('show')
        })
        if(window.innerWidth >= 992){
            $('.image').wrap('<div class="container"></div>')
        }

    </script>
@endsection
  {{-- <div class="container" id="header-mobile">

      <div class="right" id="click">
          <a href="javascript:void(0);"  class="icon visible-mobile">
            <i class="fa fa-bars fa-3x" ></i>
          </a></div>

  <img class="displayed hidden-mobile" src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg">
  <img class="displayed visible-mobile" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >
</div>


<div class="menu w-100 " id="myMenu"> 
    <a href="#Home">Home</a> 
    <a href="#kalender">Kalender</a> 
    <a href="#contact">Contact</a>
</div>


<script>


</script>    --}}



