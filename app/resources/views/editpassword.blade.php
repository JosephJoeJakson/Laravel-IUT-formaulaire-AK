<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px; min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.goToDashboard{position: absolute; bottom: 10vh; font-weight: bold; transition:.5s; text-decoration: none; color:red; border: 2px black solid; padding:20px}
.goToDashboard:hover{background-color: pink; transform:translateY(10px)}
.submit {margin-top:20px; background-color: lightgray; border: 2px black solid; padding: 5px; transition: .5s; cursor: pointer}
.submit:hover{background-color: lightgreen;}
label {margin-top:10px}
</style>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        </x-slot>
    <h1>{{__('form.modify_info')}}</h1>
    <form method="GET" action="{{ route('updatepassword', ['id' => $password->id]) }}" class="containerBody">
        @csrf
        <label for="site">{{__('form.website')}}</label>
        <input type="text" name="site" id="site" value="{{ $password->site }}" required>
        
        <label for="login">{{__('form.login')}}</label>
        <input type="text" name="login" id="login" value="{{ $password->login }}" required>
        
        <label for="password">{{__('form.password')}}</label>
        <input type="text" name="password" id="password" value="{{ $password->password }}" required>

        <!-- Hidden field for the password entry ID -->
        <input type="hidden" name="id" value="{{ $password->id }}">
        
        <button type="submit" class="submit">{{__('form.up_to_date')}}</button>
    </form>
    <a href="/dashboard" class="goToDashboard">{{__('form.go_to_dashboard')}}</a>
</x-app-layout>
