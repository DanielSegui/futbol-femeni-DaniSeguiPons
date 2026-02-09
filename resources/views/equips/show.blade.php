@extends('layouts.equip')

@section('content')
<div class="max-w-4xl mx-auto bg-black border border-red-900 shadow-2xl rounded-lg overflow-hidden">
    {{-- Capçalera amb Escut i Nom --}}
    <div class="flex flex-col items-center p-8 bg-gray-950 border-b border-red-900">
        @if($equip->escut)
        <img src="{{ asset('storage/' . $equip->escut) }}" alt="Escut de {{ $equip->nom }}" class="w-32 h-32 rounded-full shadow-md object-cover mb-4 border-2 border-red-800">
        @else
        <div class="w-32 h-32 rounded-full bg-gray-900 border border-red-900 flex items-center justify-center mb-4 text-red-700">
            <span class="text-sm font-bold uppercase">Sense Escut</span>
        </div>
        @endif
        <h1 class="text-3xl font-extrabold text-red-600 uppercase tracking-tighter">{{ $equip->nom }}</h1>
        <p class="text-gray-400 text-lg italic">{{ $equip->ciutat }} - {{ $equip->lliga }}</p>
    </div>

    {{-- Detalls --}}
    <div class="p-6 bg-black">
        <h3 class="text-xl font-bold mb-4 text-red-700 uppercase tracking-widest border-b border-red-900/30 pb-2">Informació</h3>
        <ul class="space-y-2 text-gray-300">
            <li><strong class="text-red-800">Estadi:</strong> {{ $equip->estadi ? $equip->estadi->nom : 'No assignat' }}</li>
            <li><strong class="text-red-800">Jugadores registrades:</strong> {{ $equip->jugadores->count() }}</li>
        </ul>

        <h3 class="text-xl font-bold mt-6 mb-4 text-red-700 uppercase tracking-widest border-b border-red-900/30 pb-2">Plantilla</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse($equip->jugadores as $jugadora)
            <div class="bg-gray-950 border border-red-900/50 p-3 rounded flex justify-between items-center hover:bg-red-950/20 transition">
                <span class="font-medium text-gray-200">{{ $jugadora->nom }}</span>
                <span class="text-xs bg-red-900 text-gray-100 px-2 py-1 rounded font-bold uppercase tracking-tighter">{{ $jugadora->posicio }}</span>
            </div>
            @empty
            <p class="text-gray-500 italic">No hi ha jugadores registrades.</p>
            @endforelse
        </div>
    </div>

    {{-- Botons d'Acció --}}
    <div class="p-6 bg-gray-950 border-t border-red-900 flex justify-between items-center">
        {{-- Botó per a tornar al llistat --}}
        <a href="{{ route('equips.index') }}" class="text-red-600 hover:text-red-400 font-bold flex items-center transition">
            &larr; Tornar al llistat
        </a>

        {{-- Botó per a Editar (només si tens permís) --}}
        @can('update', $equip)
        <a href="{{ route('equips.edit', $equip) }}" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow-lg transition-all uppercase text-sm tracking-widest">
            Editar Equip
        </a>
        @endcan
    </div>
</div>
@endsection