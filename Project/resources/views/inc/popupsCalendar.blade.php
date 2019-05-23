  {{-- admin voegt events bij --}}
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                  <h1 class="text-dark">Voeg een datum bij</h1>
              </div>
              <form method="POST" action="{{route('saveDate')}}" >
                  @csrf
                  <div class="form-group">
                      <label class="text-dark">titel</label>
                      <input type="text" class="form-control" name="title" placeholder="title"/>
                  </div>
                  <div class="form-group">
                      <label class="text-dark">kleur</label>
                      <input type="color" class="form-control" name="color" placeholder="kleur"/>
                  </div>
                  <div class="form-group">
                      <label class="text-dark">Start datum</label>
                      <input type="datetime-local" class="form-control" name="start_date" placeholder="Start datum"/>
                  </div>
                  <div class="form-group">
                      <label class="text-dark">eind datum</label>
                      <input type="datetime-local" class="form-control" name="end_date" placeholder="Eind datum"/>
                  </div>
                  <button type="submit" class="btn btn-dark">verzenden</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">sluiten</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- vrijwilliger kiest datum om te gaan werken --}}
    {{-- @if (!Auth::guest()) --}}
      <div class="modal fade bd-example-modal-lg workerChoose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                    <h1 class="text-dark">Kies een datum om te gaan werken</h1>
                </div>
                <table class="table table-striped table-borderd table-hover">
                  <thead class="thead">
                    <h2 class="text-dark">Op de volgende datums hebben we mensen nodig</h2>
                    <tr class="warning">
                      <th>Begin datum</th>
                      <th>Eind datum</th>
                      <th>&nbsp;</th>
                      <th>Status</th>
                    </tr>
                      @foreach ($emplWork as $event)
                        <tbody>
                            <tr>
                                <td>{{ $event->start_date}}</td>
                                <td>{{ $event->end_date}}</td>
                                <td>
                                  @if (!Auth::guest() && \App\Volunteers::where('event_id',$event->id)
                                            ->where('user_id',Auth::user()->id)
                                            ->get()->count())
                                      <button type="submit" disabled="disabled" class="btn btn-secondary text-white">Werk</button>
                                      
                                  @else
                                    @if(Auth::guest())
                                        <a href="{{route('guest.index', ['event_id' => $event->id])}}" class="btn btn-secondary text-white" >Werk</button>
                                    @else
                                        <form method="POST" action="{{route('volunteer.store')}}">
                                        @csrf
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                            <input type="hidden" name="user_id" value="{{$userId}}">
                                            <button type="submit" class="btn btn-secondary text-white">Werk</button>
                                        </form> 
                                    @endif
                                  @endif
                                </td>
                                <td>
                                    @if(!Auth::guest() && \App\Volunteers::where('event_id',$event->id)
                                            ->where('user_id',Auth::user()->id)
                                            ->where('permission',null)
                                            ->get()->count())
                                        in afwachting
                                    @elseif(!Auth::guest() && \App\Volunteers::where('event_id',$event->id)
                                            ->where('user_id',Auth::user()->id)
                                            ->where('permission',true)
                                            ->get()->count())
                                        Geaccepteerd
                                    @elseif(!Auth::guest() && \App\Volunteers::where('event_id',$event->id)
                                            ->where('user_id',Auth::user()->id)
                                            ->where('permission',false)
                                            ->get()->count())
                                        Geweigerd
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                      @endforeach
                    </thead>
                  {{$emplWork->links()}}
                  </table>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">sluiten</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- @endif --}}

  {{-- login and register popups --}}
  {{-- login (button: kies datum) --}}
  <div id="login" class="overlay">
    <div class="popup">
      <h2>Login:</h2>
      <a class="close" href="#">&times;</a>   
      <div class="row">
          <div class="col-sm-6">
            <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                                <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                                <button type="submit" class="btn btn-dark">
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
        <div class="col-sm-6" id="guestWorkChoose">
            <div class="card">
                <div class="card-header">Doorgaan als gast</div>
                <div class="card-body">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".workerChoose">Kies een datum</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- header login  --}}
    <div id="headerLogin" class="overlay">
    <div class="popup">
      <h2>Login:</h2>
      <a class="close" href="#">&times;</a>   
        <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                            <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                            <button type="submit" class="btn btn-dark">
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
    
<div id="register" class="overlay">
    <div class="popup">
    <h2>Registreren:</h2>
    <a class="close" href="#">&times;</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registreren') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

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
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mailadres') }}</label>

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
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoonnummer') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="tel" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
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
</div>
