<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px;min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: flex-start; flex-direction: column; justify-content: center;}
.goToDashboard{bottom: 10vh; font-weight: bold; transition:.5s; text-decoration: none; color:red; border: 2px black solid; padding:20px}
.goToDashboard:hover{background-color: pink; transform:translateY(10px);}
.title {font-size:320%; text-align:center;}
.containerBody {padding: 20px; border: 2px black solid; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.text {padding-top: 20px;}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('form.show_team')}}
        </h2>
    </x-slot>

    <div class="containerBody">
        <div class="containerBody1">
    @if($teams->isNotEmpty())
        @foreach($teams as $team)
            <div class="login">
                <p>{{ $team->name}}</p>
                @foreach($team->users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
                @if($team->passwords->isNotEmpty())
                <p class="text">{{__('form.team_passwords')}}</p>
                
                @foreach($team->passwords as $password)
                <p>{{ $password->site }}</p>
                <p>{{ $password->login }}</p>
                <p>{{ $password->decryptedPassword }}</p>
                @endforeach
            @endif
            </div>
            <p>---------------------------------------</p>
        @endforeach
        @else    
            <p>{{__('form.no_password')}}</p>

            <x-nav-link :href="route('password-add')">
                {{__('form.here')}}
            </x-nav-link>
        @endif
        </div>
    </div>
    <div  style="heigth: 10vh">.</div>
</x-app-layout>

