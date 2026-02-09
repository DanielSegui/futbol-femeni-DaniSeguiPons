@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-950 p-8 rounded-xl shadow-2xl border border-red-900/40">
    <h2 class="text-3xl font-extrabold mb-8 text-red-600 uppercase tracking-tighter border-b border-red-900/30 pb-4">
        Nou Estadi
    </h2>

    <form action="{{ route('estadis.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Nom --}}
        <div>
            <label for="nom" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Nom de l'Estadi</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" 
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all placeholder-gray-700" 
                placeholder="Ej: Camp de l'Infant" required>
        </div>

        {{-- Ciutat --}}
        <div>
            <label for="ciutat" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Ciutat</label>
            <input type="text" name="ciutat" id="ciutat" value="{{ old('ciutat') }}" 
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all placeholder-gray-700" 
                placeholder="Ej: Alcoi" required>
        </div>

        {{-- Capacitat --}}
        <div>
            <label for="capacitat" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Capacitat</label>
            <input type="number" name="capacitat" id="capacitat" value="{{ old('capacitat') }}" 
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all placeholder-gray-700" 
                placeholder="Ej: 5000" required>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-red-900/30 mt-8">
            <a href="{{ route('estadis.index') }}" class="text-gray-500 hover:text-white transition-colors text-sm font-medium">
                Cancel·lar
            </a>
            <button type="submit" class="bg-red-800 hover:bg-red-700 text-white font-black py-2 px-8 rounded-lg shadow-lg hover:shadow-red-900/40 transition-all uppercase tracking-widest text-sm">
                Guardar Estadi
            </button>
        </div>
    </form>
</div>
@endsection