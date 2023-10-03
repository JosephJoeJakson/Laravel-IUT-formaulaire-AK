<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('dashboard.dashboard')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                {{__('dashboard.logged_in')}}
                    <br>
                    <br>
                    <a href="/formulaire" style="color:magenta">-> {{__('dashboard.add_passwords')}} <-</a>
        <br style="margin:20px">
        <a href="/showpassword" style="color:darkblue">-> {{__('dashboard.see_passwords')}} <-</a>
        <br>
        <a href="/teamformulaire" style="color:blue">-> {{__('dashboard.add_team')}} <-</a>
                </div>
            </div>
        </div>
</div>
</x-app-layout>
