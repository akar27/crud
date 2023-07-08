<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</div>
            {{ __('your Taches') }}  
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
        </tr>
        @endforeach
    </table>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">      
                        {{ $tashes->sum('cout') }} DH     
                </div>
                <div class="p-6 text-gray-900">      
                       total {{ $dur }} j   
                </div>                       
            </div>
        </div>
    </div>
    
</x-app-layout>