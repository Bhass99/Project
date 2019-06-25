<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vrijwilligers werk geweigerd</title>
</head>
<body>
     <h4>Geachte heer/mevrouw, <b>
        @if ($user === Null)
            {{$guest->last_name}}
        @else
            {{$user->last_name}}
        @endif
    </b>
    </h4>
    <br>
    <p>Bij deze sturen wij u een bevestegings email dat U geweigerd bent om te komen werken op <b>{{$event->start_date}}</b> 
        tot <b>{{$event->end_date}}</b></p>
    <p>Neem contact op als u meer wilt weten.</p>
    <p>Met vriendelijke groet,</p>
    <br>
    Het gv impala team
</body>
</html>