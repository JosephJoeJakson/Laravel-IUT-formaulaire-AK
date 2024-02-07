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
        {{__('form.add_info')}}
        </h2>
    </x-slot>

    <form action="{{route('password-store')}}" method="POST" class="containerBody">
        @csrf
        <label for="url" >{{__('form.website')}}</label>
        <input type="text" name="url" id="url" class="@error('url') is-invalid @enderror">
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="email">{{__('form.login')}}</label>
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">{{__('form.password')}}</label>
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="submit" type="submit" value="{{__('form.validate_button')}}">
    </form>
</x-app-layout>


