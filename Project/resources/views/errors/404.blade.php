@extends('errors::illustrated-layout')

@section('code', 'Sorry')
@section('title', __('Sorry, de pagina is niet gevonden'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('de pagina is niet gevonden.'))
