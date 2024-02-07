<style>
body { display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {padding: 20px; min-height: 50vh; border: 2px black solid; min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.login>a:nth-of-type(1) {padding:10px;color:blue;}
.login>a:nth-of-type(2) {padding:10px;color:orange;}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('form.show_info')}}
        </h2>
    </x-slot>

    <div class="containerBody">
        @if($passwords->isNotEmpty())
            @foreach($passwords as $login)
                <div class="login">
                    <p>{{__('form.website')}} {{ $login->site }}</p>
                    <p>{{__('form.login')}} {{ $login->login }}</p>
                    <p>{{__('form.password')}} {{ $login->password }}</p>
                    <a href="{{ route('password-edit', ['id' => $login->id]) }}">{{__('form.modify_password')}}</a>
                    <br>
                    <a href="{{ route('password-add-team-get', ['id' => $login->id]) }}">{{__('form.add_to_team_password')}}</a>
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
</x-app-layout>


