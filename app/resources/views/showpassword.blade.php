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
    <h1>{{__('form.show_info')}}</h1>

        @if($passwords->isNotEmpty())
            @foreach($passwords as $login)
            <div class="login">
        <p>{{__('form.website')}} {{ $login->site }}</p>
        <p>{{__('form.login')}} {{ $login->login }}</p>
        <p>{{__('form.password')}} {{ $login->password }}</p>
        <a href="{{ route('editpassword', ['id' => $login->id]) }}">{{__('form.modify_password')}}</a>
    </div>
                <p>---------------------------------------</p>
            @endforeach
        @else    
            <p>{{__('form.no_password')}}</p>
            <a href="/formulaire">{{__('form.here')}}</a>
        @endif
        <a href="/dashboard" style="position: absolute; bottom: 10vh; font-weight: bold; text-decoration: none; color:red">-> {{__('form.go_to_dashboard')}} <-</a>
    </body>
   
</html>


