<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Projects') }}
        </h2>
    </x-slot>
    <div class="container">
    <form method="POST" action="{{ route('storepro') }}">
            @csrf
            Intutile : <input type="text" class="form-control" name="intitule">
            <br />
            Lieu: <input type="text" class="form-control" name="lieu">
            <br />
            <input type="submit" value="Add" />
        </form>
    </div>
    
</x-app-layout>