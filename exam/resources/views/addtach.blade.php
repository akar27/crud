<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tache') }}
        </h2>
    </x-slot>
    <div class="container">
    <form method="POST" action="{{ route('storetach')}}">
            @csrf
            nom tache : <input type="text" class="form-control" name="nom">
            <br />
            date debut: <input type="date" class="form-control" name="date_debut">
            <br />
            date fin: <input type="date" class="form-control" name="date_fin">
            <br />
            cout : <input type="number" class="form-control" name="cout">
            <br />
            employes
            <select multiple name="employes" class="form-control">
                @foreach ($emps as $emp)
                    <option value="{{ $emp->id }}">{{ $emp->prenom }} {{ $emp->name }}</option>
                @endforeach
            </select>
            <br>
            <input type="hidden" value="{{ $tacid}}"  class="form-control" name="key">
            <br />
            <input type="submit" value="Add" />
        </form>
    </div>
    
</x-app-layout>