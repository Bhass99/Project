<header>
    <div class="gray-balk">
        <div class="container">
            @guest
                <div class="gray-balk-text">
                    <a class="credentials float-left" href="#login">Login | </a>
                    <a class="credentials float-left" href="#register">&nbsp; Registreren</a>   
                </div>
                @else
                <div class="loged-in">
                    <a class="float-right  credentials" href="{{ route('logout') }}"
                        style="text-decoration: none"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    @if (Auth::User()->role == 'admin')
                        <a href="{{route('createEvents')}}" style="text-decoration: none" class="credentials float-right mr-3">Admin panel</a>
                    @endif

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
            <div class="container">
                <img class="image" src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg">
                <img class="image-mobile" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >
                {{-- <i class="fa fa-bars fa-2x" id="hamburger"></i> --}}
            </div>
        </div>
        {{-- <div class="nav-links" id="menu">
            <ul class="nav-links-list">
                <li><a href="#home">Home</a></li>
                <li><a href="#calendar">Kalender</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div> --}}
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

    </script>
@endsection

