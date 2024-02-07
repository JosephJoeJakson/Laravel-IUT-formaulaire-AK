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
        {{__('form.modify_info')}}
        </h2>
    </x-slot>

    <form method="GET" action="{{ route('password-update', ['id' => $password->id]) }}" class="containerBody">
        @csrf
        <label for="site">{{__('form.website')}}</label>
        <input type="text" name="site" id="site" value="{{ $password->site }}" required>
        
        <label for="login">{{__('form.login')}}</label>
        <input type="text" name="login" id="login" value="{{ $password->login }}" required>
        
        <label for="password">{{__('form.password')}}</label>
        <input type="text" name="password" id="password" value="{{ $password->password }}" required>

        <input type="hidden" name="id" value="{{ $password->id }}">
        
        <button type="submit" class="submit">{{__('form.up_to_date')}}</button>
    </form>
</x-app-layout>
