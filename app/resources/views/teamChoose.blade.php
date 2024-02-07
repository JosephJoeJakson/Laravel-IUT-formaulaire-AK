<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
form {padding: 20px; min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.submit {margin-top:20px; background-color: lightgray; border: 2px black solid; padding: 5px; transition: .5s; cursor: pointer}
.submit:hover{background-color: lightgreen;}
label {margin-top:10px}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('form.join_team')}}
        </h2>
    </x-slot>

    <form action="{{ route('team-join') }}" method="POST" class="form">
        @csrf
        <label for="name">{{__('form.team_name_label')}}</label>

        @if($teams->isNotEmpty())
            <select name="name" id="name" class="@error('name') is-invalid @enderror" required>
                @foreach($teams as $team)
                <option value="{{ $team->name}}">{{ $team->name}}</option>
                @endforeach
            </select>
            @else
            <p>{{__('form.no_password')}}</p>
            <x-nav-link :href="route('password-add')">
                {{__('form.here')}}
            </x-nav-link>
            @endif    

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email">{{__('form.user_email_label')}}</label>
        <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror">
        @error('email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <input class="submit" type="submit" value="{{__('form.validate_button')}}">
    </form>
</x-app-layout>