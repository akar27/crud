<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add materiel') }}
        </h2>
    </x-slot>
    <div class="container">
    <form method="POST" action="{{ route('storemat') }}">
            @csrf
            libelle : <input type="text" class="form-control" name="libelle">
            <br />
            cout: <input type="number" class="form-control" name="cout">
            <br />
            <input type="submit" value="Add" />
            <br>
            <input type="hidden" value="{{ $idu}}"  class="form-control" name="key">
        </form>
    </div>
    
</x-app-layout>