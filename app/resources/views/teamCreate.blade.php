<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px; min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.submit {margin-top:20px; background-color: lightgray; border: 2px black solid; padding: 5px; transition: .5s; cursor: pointer}
.submit:hover{background-color: lightgreen;}
label {margin-top:10px}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('form.create_team')}}
        </h2>
    </x-slot>
    
    <form action="{{route('team-store')}}" method="POST" class="form containerBody">
         @csrf
        <label for="name">{{__('form.team_name_label')}}</label>
        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{__('form.team_name_taken')}}</div>
        @enderror
        <input class="submit" type="submit" value="{{__('form.validate_button')}}">
    </form>
</x-app-layout>