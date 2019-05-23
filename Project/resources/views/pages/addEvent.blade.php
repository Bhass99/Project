@extends('layout.admin')

@section('admin-content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger" role="alert">
                <p>{{ session('failed') }}</p>
            </div>
        @endif
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
@endsection