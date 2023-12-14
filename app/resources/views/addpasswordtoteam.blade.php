<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px;min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
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
    <div class="containerBody">
    <label for="site">{{__('form.website')}}</label>
        <p name="site" id="site">{{ $password->site }}</p>
        
        <label for="login">{{__('form.login')}}</label>
        <p name="login" id="login">{{ $password->login }}</p>
        
        <label for="password">{{__('form.password')}}</label>
        <p name="password" id="password">{{ $password->password }}</p>

    <form method="GET" action="{{ route('addtoteam', ['id' => $password->id]) }}">
        @csrf
        
        <label for="team"> Choisr la team : </label>
        @if($teams->isNotEmpty())
            <select name="team" id="team" class="teams" required>
            @foreach($teams as $team)
                <option value="{{ $team->name}}">{{ $team->name}}</option>
            @endforeach
            </select>
        @else    
            <p>{{__('form.no_password')}}</p>
            <a href="/formulaire">{{__('form.here')}}</a>
        @endif

        <!-- Hidden field for the password entry ID -->
        <input type="hidden" name="id" value="{{ $password->id }}">
        
        <button type="submit" class="submit">Ajouter à la team</button>
    </form>
    </div>
    <div  style="heigth: 10vh">.</div>
    <a href="/dashboard" class="goToDashboard">{{__('form.go_to_dashboard')}}</a>
</x-app-layout>