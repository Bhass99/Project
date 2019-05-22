@extends('layout.layout')
@section('extra-css')
    <link href="{{asset('css/guestsCredentials.css')}}" rel="stylesheet">
  
@endsection
@section('content')
    @include('inc.header')
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>{{$errors}}</p>
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
</div>
<div class="container">                                            
    <form class="form-signin"  method="POST" action="{{route('guest.store')}}">
      @csrf
      <input type="hidden" name="event_id" value="{{$event_id}}">
      <h1 class="h3 mb-3 font-weight-normal">U bent er bijna... </h1>
      <p>We hebben uw naam en email nodig om uw verzoek te verzenden</p>
      <label for="fname" class="sr-only">Naam</label>
      <input type="text" id="fnaam" class="form-control" name="name" placeholder="Voornaam" required autofocus>
      <label for="naam" class="sr-only">Naam</label>
      <input type="text" id="lnaam" class="form-control" name="last_name" placeholder="Achternaam" required autofocus>
      <label for="email" class="sr-only">Password</label>
      <input type="email" id="email"name="email" class="form-control" placeholder="Email adres" required>
      
      <button class="btn btn-lg btn-dark btn-block mt-4 mb-1" type="submit">Verzenden</button>
      <a href="{{route('events')}}" class="btn btn-lg btn-light btn-block mb-4">Terug</a>
    </form>
</div>

@include('inc.footer')

@endsection