@extends('layouts.equip')

@section('title', 'Editar Equip')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-950 p-8 rounded-xl shadow-2xl border border-red-900/40">
    <h2 class="text-3xl font-extrabold mb-8 text-red-600 uppercase tracking-tighter border-b border-red-900/30 pb-4">
        Editar Equip: <span class="text-gray-100">{{ $equip->nom }}</span>
    </h2>

    <form action="{{ route('equips.update', $equip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div>
            <label for="nom" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Nom de l'Equip</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $equip->nom) }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all" required>
            @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Ciutat --}}
        <div>
            <label for="ciutat" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Ciutat</label>
            <input type="text" name="ciutat" id="ciutat" value="{{ old('ciutat', $equip->ciutat) }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all">
            @error('ciutat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Lliga --}}
        <div>
            <label for="lliga" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Lliga</label>
            <input type="text" name="lliga" id="lliga" value="{{ old('lliga', $equip->lliga) }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all">
            @error('lliga') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Escut (Image) --}}
        <div class="p-4 bg-black rounded-lg border border-red-900/20">
            <label for="escut" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-3">Escut de l'Equip</label>

            @if($equip->escut)
            <div class="mb-4 flex items-center space-x-4">
                <div class="text-center">
                    <p class="text-[10px] text-gray-500 uppercase mb-1">Actual</p>
                    <img src="{{ asset('storage/' . $equip->escut) }}" alt="Escut actual" class="h-16 w-16 object-cover border border-red-900/50 rounded p-1 bg-gray-900">
                </div>
                <div class="text-gray-600 text-xs italic">← Pots pujar-ne un de nou per substituir-lo</div>
            </div>
            @endif

            <input type="file" name="escut" id="escut"
                class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-red-900 file:text-red-100 hover:file:bg-red-800 cursor-pointer transition-all">
            @error('escut') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex items-center justify-between pt-6 border-t border-red-900/30">
            <a href="{{ route('equips.index') }}" class="text-gray-500 hover:text-white transition-colors text-sm font-medium">
                ← Cancel·lar
            </a>
            <button type="submit" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg shadow-lg hover:shadow-red-900/40 transition-all uppercase tracking-widest text-sm">
                Actualitzar Equip
            </button>
        </div>
    </form>
</div>
@endsection