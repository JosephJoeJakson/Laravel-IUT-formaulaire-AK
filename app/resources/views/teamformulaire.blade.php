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
    <h1>{{__('form.create_team')}}</h1>
    <form action="{{route('TeamCreate')}}" method="POST" class="form containerBody">
         @csrf
        <label for="name">{{__('form.team_name_label')}}</label>
        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{__('form.team_name_taken')}}</div>
        @enderror
        <input class="submit" type="submit" value="{{__('form.validate_button')}}">
    </form>
    
    <a href="/dashboard" class="goToDashboard">{{__('form.go_to_dashboard')}}</a>
</x-app-layout>