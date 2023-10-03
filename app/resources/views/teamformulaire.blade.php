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

    <form action="{{route('TeamForm')}}" method="POST" class="form">
        @csrf
        <label for="name" >Nom de la team :</label>
        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">Le nom de team est déjà pris, merci d'en choisr un autre</div>
        @enderror
        <input type="submit" value="Valider">
    </form>
    <br>
    <a href="/dashboard" style="position: absolute; bottom: 10vh; font-weight: bold; text-decoration: none; color:red">-> Vers le Dashboard <-</a>
    </body>
</html>


