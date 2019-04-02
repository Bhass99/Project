  {{--  --}}
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                  <h1>Voeg een datum bij</h1>
              </div>
              <form method="POST" action="{{route('saveDate')}}" >
                  @csrf
                  <div class="form-group">
                      <label>titel</label>
                      <input type="text" class="form-control" name="title" placeholder="title"/>
                  </div>
                  <div class="form-group">
                      <label>kleur</label>
                      <input type="color" class="form-control" name="color" placeholder="kleur"/>
                  </div>
                  <div class="form-group">
                      <label>Start datum</label>
                      <input type="datetime-local" class="form-control" name="start_date" placeholder="Start datum"/>
                  </div>
                  <div class="form-group">
                      <label>eind datum</label>
                      <input type="datetime-local" class="form-control" name="end_date" placeholder="Eind datum"/>
                  </div>
                  <button type="submit" class="btn btn-primary">verzenden</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- vrijwilliger kiest datum om te gaan werken --}}
    @if (!Auth::guest())
      <div class="modal fade bd-example-modal-lg workerChoose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                    <h1>Kies een datum om te gaan werken</h1>
                </div>
                <table class="table table-striped table-borderd table-hover">
                  <thead class="thead">
                    <h2>Op de volgende datums hebben we mensen nodig</h2>
                    <tr class="warning">
                      <th>Begin datum</th>
                      <th>Eind datum</th>
                      <th>&nbsp;</th>
                      <th>In afwachting</th>
                    </tr>
                      @foreach ($emplWork as $event)
                        <tbody>
                            <tr>
                                <td>{{ $event->start_date}}</td>
                                <td>{{ $event->end_date}}</td>
                                <td>
                                  @if (\App\Volunteers::where('event_id',$event->id)->get()->count() && $volunteerId)
                                      <button type="submit" disabled="disabled" class="btn btn-secondary text-white">Werk</button>
                                      
                                  @else
                                    <form method="POST" action="{{route('volunteer.store')}}">
                                      @csrf
                                      <input type="hidden" name="event_id" value="{{$event->id}}">
                                      <input type="hidden" name="user_id" value="{{$userId}}">
                                      <button type="submit" class="btn btn-secondary text-white">Werk</button>
                                    </form>
                                  @endif
                                </td>
                                <td>
                                  @if (\App\Volunteers::where('event_id',$event->id)->get()->count() && $volunteerId)
                                    in afwachting
                                  @endif
                                </td>
                            </tr>
                        </tbody>
                      @endforeach
                    </thead>
                  {{$emplWork->links()}}
                  </table>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif