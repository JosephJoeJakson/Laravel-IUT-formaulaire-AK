<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    <br>
                    <a href="/formulaire" style="color:magenta">-> Ajouter des mots de passes <-</a>
        <br style="margin:20px">
        <a href="/showpassword" style="color:darkblue">-> Voir vos mots de passe <-</a>
        <br>
        <a href="/teamformulaire" style="color:blue">-> Créer une Team <-</a>
                </div>
            </div>
        </div>
</div>
</x-app-layout>
