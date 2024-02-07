<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px;min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.submit {margin-top:20px; background-color: lightgray; border: 2px black solid; padding: 5px; transition: .5s; cursor: pointer}
.submit:hover{background-color: lightgreen;}
label {margin-top:10px}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('form.modify_info')}}
        </h2>
    </x-slot>

    <div class="containerBody">
        <label for="site">{{__('form.website')}}</label>
        <p name="site" id="site">{{ $password->site }}</p>

        <label for="login">{{__('form.login')}}</label>
        <p name="login" id="login">{{ $password->login }}</p>

        <label for="password">{{__('form.password')}}</label>
        <p name="password" id="password">{{ $password->password }}</p>

        <form method="GET" action="{{ route('password-add-team-associate', ['id' => $password->id]) }}">
            @csrf

            <label for="team">{{__('form.choose_team')}}</label>
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

            <input type="hidden" name="id" value="{{ $password->id }}">

            <button type="submit" class="submit">{{__('form.add_team')}}</button>
        </form>
    </div>
</x-app-layout>
