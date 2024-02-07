<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 50px; border: 2px black solid; min-width: 50vw; min-height: 50vh; display: flex; align-items: start; justify-content: space-evenly;}
.containerBody1 {background-color: rgb(243 244 246); padding: 20px; border: 2px black solid; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.containerBody2 {background-color: rgb(243 244 246); padding: 20px; border: 2px black solid;  display: flex; align-items: center; flex-direction: column; justify-content: center;}
.containerBody a {background-color: lightblue; width:100%; padding: 10px; margin: 5px; border: 2px black solid; transition:.5s}
.containerBody a:hover {background-color:lightgreen;}
h1 {margin: 20px !important;}
</style>
 <x-app-layout>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.dashboard') }}
        </h2>
    </x-slot>

<div class="containerBody">
<div class="containerBody1">
    <h2 class="text-2xl font-bold mb-4">{{__('dashboard.password')}}</h2>

    
    <a href="{{ route('password-add') }}">
        {{__('dashboard.add_passwords')}}
    </a>

    <a href="{{ route('password-display') }}">
        {{__('dashboard.see_passwords')}}
    </a>

</div>
<div class="containerBody2">
    <h2 class="text-2xl font-bold mb-4">{{__('dashboard.team')}}</h2>
    <a href="{{ route('team-create') }}" >
        {{__('dashboard.add_team')}}

    <a href="{{ route('team-display') }}">
        {{__('dashboard.show_team')}}
    </a>

    <a href="{{ route('team-choose') }}" >
        {{__('dashboard.join_team')}}
    </a>
</div>
</div>
</x-app-layout> 
    