
<div class="header">
    <div class="container">
         <!-- Authentication Links -->
         @guest
            <div class="right">
                <a class="credintals" href="#popup1"><b>Login</b></a> |
                <a class="credintals" href="#popup2"><b>Nog geen account? registreer dan hier!</b></a>
            </div>
     @else
         Welkom, {{ Auth::user()->name }} <span class="caret"></span>
       
             <a class="float-right text-white" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
        
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
         

              
     @endguest
 

    </div>
        
               

    
  </div>

  
  
  <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Login:</h2>
      <a class="close" href="#">&times;</a>
      
          
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">{{ __('Login') }}</div>
          
                          <div class="card-body">
                              <form method="POST" action="{{ route('login') }}">
                                  @csrf
          
                                  <div class="form-group row">
                                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
          
                                      <div class="col-md-6">
                                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          
                                          @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
          
                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          
                                          @if ($errors->has('password'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <div class="col-md-6 offset-md-4">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          
                                              <label class="form-check-label" for="remember">
                                                  {{ __('Remember Me') }}
                                              </label>
                                          </div>
                                      </div>
                                  </div>
          
                                  <div class="form-group row mb-0">
                                      <div class="col-md-8 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Login') }}
                                          </button>
          
                                          @if (Route::has('password.request'))
                                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                                  {{ __('Forgot Your Password?') }}
                                              </a>
                                          @endif
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
      
    </div>
  </div>
   

   
  </div>
  
  <div id="popup2" class="overlay">
    <div class="popup">
      <h2>Registreren:</h2>
      <a class="close" href="#">&times;</a>
    
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required >
    
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>

   
   

  
  <div class="container">
    
    
  </div>
  
</div>

  <div class="container">

      <div class="right">
          <a href="javascript:void(0);" id="click" class="icon visible-mobile">
            <i class="fa fa-bars fa-3x" ></i>
          </a></div>

  <img class="displayed hidden-mobile" src="https://gvimpala.nl/wp-content/uploads/Impala-14-1024x293-1-e1519314257687.jpg">
  <img class="displayed visible-mobile" src="https://gvimpala.nl/wp-content/uploads/LustrumLogo2018-3-e1519314202794.jpg" >

  

</div>


<div class="menu hidden-mobile w-100" id="myMenu">
    
    
        
        
        <a href="#Home">Home</a> 
        <a href="#kalender">Kalender</a> 
        <a href="#contact">Contact</a>
        
   
    
      
</div>


<!--<div class="buttonposition">
<button type="button" class="btn btn-success">Login</button>
<button type="button" class="btn btn-primary">Registreren</button>
</div> -->


<script>
// function myFunction() {
// var x = document.getElementById("myMenu");
// if (x.className === "menu") {
//   x.className += " responsive";
// } else {
//   x.className = "menu";
// }
// }
$('#click').click(() =>{
    $('#myMenu').toggleClass(' responsive')
})
</script>   



