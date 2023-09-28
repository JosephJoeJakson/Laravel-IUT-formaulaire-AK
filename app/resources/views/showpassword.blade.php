<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-Kaluzny Adrien</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        @if($passwords->isNotEmpty())
            @foreach($passwords as $login)
            <div class="login">
        <p>Site: {{ $login->site }}</p>
        <p>Login: {{ $login->login }}</p>
        <p>Mot de passe: {{ $login->password }}</p>
        <a href="{{ route('editpassword', ['id' => $login->id]) }}">Modifier votre mot de passe</a>
    </div>
                <p>---------------------------------------</p>
            @endforeach
        @else    
            <p>Aucun mot de passe</p>
        @endif
    </body>
   
</html>


