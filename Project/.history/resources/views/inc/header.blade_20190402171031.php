<header>
    <div class="gray-balk">
        <div class="container">
            @guest
                <div class="gray-balk-text">
                    <a class="credentials" href="#popup1">Login |</a>
                    <a class="credentials" href="#popup2">Nog geen account? registreer dan hier!</a>   
                </div>
                @else
                <div>
                    <a class="float-right text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>    
                </div>
                Welkom, {{ Auth::user()->name }} <span class="caret"></span>
            @endguest
        </div>
    </div>
    <nav>
        <div class="logo">
            <img class="image" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="#home">HOME</a></li>
                <li><a href="#home">CALENDAR</a></li>
                <li><a href="#home">CONTACT</a></li>
            </ul>
        </div>
    </nav>
</header>

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

$('#click').click(() => {
    $('#myMenu').toggleClass('responsive')
})
</script>    --}}



