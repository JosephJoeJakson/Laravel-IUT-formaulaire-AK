<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<style>
body {  font-family: 'Figtree'; display:flex; align-items: center; flex-direction: column; justify-content: center; min-height: 90vh}
.containerBody {background-color: rgb(243 244 246); border: 2px black solid; padding: 20px; min-height: 80vh;  min-width: 50vw; display: flex; align-items: center; flex-direction: column; justify-content: center;}
.containerBodyInside {padding: 20px; border: 2px black solid; display: flex; align-items: center; flex-direction: column; justify-content: center;}
a {padding: 20px; background-color: lightblue; transition:.5s; border: 2px black solid; text-decoration:none; font-weight:bold; color:black}
a:hover {background-color:lightgreen; }
h2{font-size:320%}
</style>
<div class="flex justify-between h-1">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex font-medium">
                  
        @foreach (config('app.locales') as $locale => $language)
                    <x-nav-link href="{{ route('lang.switch', $locale) }}" >
                    {{ $language }}
                    </x-nav-link>

                    @endforeach
  
                </div>
        </div>
<div class="containerBody">
    <div class="containerBodyInside">
        <h2 class="">Laravel</h2>
        <h3>{{__('auth.title')}}</h3>
        
    </div>
        @if (Route::has('login'))
        <div class="">
            @auth
            <a href="{{ url('/dashboard') }}" class="f">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="">Register</a>
            @endif
            @endauth
        </div>
        @endif
</div>
