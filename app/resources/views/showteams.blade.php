<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-Kaluzny Adrien</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
        body {
            display:flex; align-items: center; flex-direction: column;
            justify-content: center;
            min-height: 90vh
        }
        </style>
        </head>
    <body class="antialiased">
    <h1>{{__('form.show_team')}}</h1>

        @if($teams->isNotEmpty())
            @foreach($teams as $team)
            <div class="login">
        <p>{{ $team->name}}</p>
    </div>
                <p>---------------------------------------</p>
            @endforeach
        @else    
            <p>{{__('form.no_password')}}</p>
            <a href="/formulaire">{{__('form.here')}}</a>
        @endif
        <div  style="heigth: 10vh">.</div>
        <a href="/dashboard" style="position: fixed; bottom: 10vh; font-weight: bold; text-decoration: none; color:red">-> {{__('form.go_to_dashboard')}} <-</a>
    </body>
   
</html>


