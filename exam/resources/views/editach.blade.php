
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projet') }}
        </h2>
    </x-slot>
<div class="container">
    <form action="{{ route('stortach') }}" method="POST">
        @method('PUT')
            @csrf
            Nom : <input type="text" class="form-control" name="nom" value="{{ $tache->nom_tache }}">
            <br><br>
            Date Debut : <input type="date" class="form-control" name="date_debut" value="{{ $tache->date_debut }}">
            <br><br>
            Date Fin : <input type="date" class="form-control" name="date_fin" value="{{ $tache->date_fin }}">
            <br><br>
            Cout : <input type="text" class="form-control" name="cout" value="{{ $tache->cout }}">
            <br><br>
            {{-- Cout : <input type="hidden" class="form-control" name="projet_id" value="{{ $tache->projet_id }}">
            <br><br> --}}
            <label for="">Employes</label>
            <select multiple name="employes[]" class="form-control">
                @foreach ($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->fname }} {{ $employe->lname }}</option>
                @endforeach
            </select>
            <br />
            <button type="submit" class="btn btn-outline-primary">UPDATE</button>
        </form>

    </div>
</x-app-layout>