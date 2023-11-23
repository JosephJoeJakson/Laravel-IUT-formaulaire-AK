<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px; min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.goToDashboard{position: absolute; bottom: 10vh; font-weight: bold; transition:.5s; text-decoration: none; color:red; border: 2px black solid; padding:20px}
.goToDashboard:hover{background-color: pink; transform:translateY(10px)}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1>{{__('form.show_info')}}</h1>
    <div class="containerBody">
        @if($passwords->isNotEmpty())
            @foreach($passwords as $login)
                <div class="login">
                    <p>{{__('form.website')}} {{ $login->site }}</p>
                    <p>{{__('form.login')}} {{ $login->login }}</p>
                    <p>{{__('form.password')}} {{ $login->password }}</p>
                    <a href="{{ route('editpassword', ['id' => $login->id]) }}">{{__('form.modify_password')}}</a>
                </div>
                <p>---------------------------------------</p>
            @endforeach
        @else    
            <p>{{__('form.no_password')}}</p>
            <a href="/formulaire">{{__('form.here')}}</a>
        @endif
    </div>
    <a href="/dashboard" class="goToDashboard">{{__('form.go_to_dashboard')}}</a>
</x-app-layout>


