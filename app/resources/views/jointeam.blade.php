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
    <h1>{{__('form.join_team')}}</h1>
    <form action="{{route('TeamJoin')}}" method="POST" class="form">
        @csrf
        <label for="name">{{__('form.team_name_label')}}</label>
        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{__('form.team_name_taken')}}</div>
        @enderror
        <input type="submit" value="{{__('form.validate_button')}}">
    </form>
    <br>
    <a href="/dashboard" style="position: absolute; bottom: 10vh; font-weight: bold; text-decoration: none; color:red">-> {{__('form.go_to_dashboard')}} <-</a>
    </body>
</html>
