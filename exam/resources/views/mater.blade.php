<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</div>
            {{ __('Materiels') }}  
        </h2>
    </x-slot>

    <table class="pro">
        <tr>
            <th>id</th>
            <th>libelle</th>
            <th>cout</th>
            <th>del</th>
        </tr>
        @foreach($matrs as $matr)
        <tr>
            <td>{{$matr->id}}</td>
            <td>{{$matr->libelle}}</td>
            <td>{{$matr->cout}}</td>
            <td>
                <form method="POST" action="{{ route('deletemat', $matr->id) }}" >
                    @method('DELETE')
                    @csrf
                    <button type="submit">delete materiel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
</x-app-layout>