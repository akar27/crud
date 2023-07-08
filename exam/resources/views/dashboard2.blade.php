<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as a user") }}
                </div>
            </div>
        </div>
    </div> -->
    <div>"You're logged in as an admin"</div>
    <table class="pro">
        <tr>
            <th>id</th>
            <th>lieu</th>
            <th>intitule</th>
            <th>tache</th>
            <th colspan="2">X</th>
        </tr>
        @foreach($projects as $pro)
        <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->lieu}}</td>
            <td>{{$pro->intitule}}</td>
            <td>
                <form action="{{ route('tach', $pro->id) }}">
                    <button type="submit">list tache</button>
                </form>
            </td>
            <td>
                <form action="{{ route('createtach', $pro->id) }}" method="GET">
                    @csrf
                    <button type="submit">add tache</button>
                </form>
            </td>
            <td>
                <form method="POST" action="{{ route('deletepro', $pro->id) }}" >
                    @method('DELETE')
                    @csrf
                    <button type="submit">delete projet</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">      
                <form action="{{ route('createpro') }}" method="GET">
                    @csrf
                    <button type="submit">add projet</button>
                </form>   
                </div>                      
            </div>
        </div>
    </div>


</x-app-layout>