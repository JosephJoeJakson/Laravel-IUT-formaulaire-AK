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

    <form action="{{route('LoginForm')}}" method="POST">
        @csrf
        <label for="url" >URL :</label>
        <input type="text" name="url" id="url" class="@error('url') is-invalid @enderror">
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="email">Login : </label>
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Valider">
    </form>
    </body>
</html>


