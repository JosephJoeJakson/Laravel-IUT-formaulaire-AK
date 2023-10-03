<!-- editpassword.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>
        form {display:flex; align-items: center; flex-direction: column;justify-content: center}label {margin-top: 2vh;}input, div {margin-bottom: 2vh}body {display:flex; align-items: center; flex-direction: column;justify-content: center;min-height: 90vh}
        </style>
</head>
<body class="antialiased">
    <h1>Modifier vos informations </h1>
    <form method="GET" action="{{ route('updatepassword', ['id' => $password->id]) }}">
        @csrf
        <label for="site">Site:</label>
        <input type="text" name="site" id="site" value="{{ $password->site }}" required>
        
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value="{{ $password->login }}" required>
        
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="{{ $password->password }}" required>

        <!-- Hidden field for the password entry ID -->
        <input type="hidden" name="id" value="{{ $password->id }}">
        
        <button type="submit">Mettre mes informations</button>
    </form>
</body>
</html>
