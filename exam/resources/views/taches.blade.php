<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Taches') }}
        </h2>
    </x-slot>

    <table class="pro">
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>duree</th>
            <th>cout</th>
            <th>materiels</th>
            <th>add materiel</th>
            <th colspan="2">X</th>
        </tr>
        {{$dur = 0}}
        @foreach($tashes as $tash)
        <tr>
            <td>{{$tash->id}}</td>
            <td>{{$tash->nom_tache}}</td>
            <td>{{$tash->date_debut}}</td>
            <td>{{$tash->date_fin}}</td>
            <td>{{ Carbon\Carbon::parse($tash->date_fin)
                ->diffInDays(Carbon\Carbon::parse($tash->date_debut)) }} j</td>

            {{$dur = $dur + Carbon\Carbon::parse($tash->date_fin)
                ->diffInDays(Carbon\Carbon::parse($tash->date_debut))}}

            <td>{{$tash->cout}} DH</td>
            <td>
                <form action="{{ route('matshow', $tash->id) }}" method="GET">
                    @csrf
                    <button type="submit">list materiel</button>
                </form>
            </td>
            <td>
                <form action="{{ route('addmat', $tash->id) }}" method="GET">
                    @csrf
                    <button type="submit">add materiel</button>
                </form>
            </td>
            <td>
                <form action="{{ route('editach', $tash->id) }}" method="POST">
                    @csrf
                    <button type="submit">edit</button>
                </form>
            </td>
            <td>
                <form action="{{ route('deltach', $tash->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    total cout {{ $tashes->sum('cout') }} DH
                </div>
                <div class="p-6 text-gray-900">
                    duration {{ $dur }} j
                </div>
            </div>
        </div>
    </div>
</x-app-layout>