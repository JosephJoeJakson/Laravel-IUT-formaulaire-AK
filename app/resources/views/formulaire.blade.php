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
        form {display:flex; align-items: center; flex-direction: column;justify-content: center}label {margin-top: 2vh;}input, div {margin-bottom: 2vh}body {display:flex; align-items: center; flex-direction: column;justify-content: center;min-height: 90vh}
        </style>
    </head>
    <body class="antialiased">
    <h1>{{__('form.add_info')}}</h1>
    <form action="{{route('LoginForm')}}" method="POST">
        @csrf
        <label for="url" >{{__('form.website')}}</label>
        <input type="text" name="url" id="url" class="@error('url') is-invalid @enderror">
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="email">{{__('form.login')}}</label>
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">{{__('form.password')}}</label>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="{{__('form.validate_button')}}">
    </form>
    </body>
</html>


