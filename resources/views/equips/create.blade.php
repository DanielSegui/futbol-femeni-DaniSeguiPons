@extends('layouts.equip')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-950 p-8 rounded-xl shadow-2xl border border-red-900/30">
    <h2 class="text-3xl font-extrabold mb-8 text-red-700 uppercase tracking-tighter border-b border-red-900 pb-4">
        Nou Equip
    </h2>

    <form action="{{ route('equips.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="nom" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Nom de l'Equip</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all" required>
        </div>

        <div>
            <label for="ciutat" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Ciutat</label>
            <input type="text" name="ciutat" id="ciutat" value="{{ old('ciutat') }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all" required>
        </div>

        <div>
            <label for="lliga" class="block text-xs font-bold text-red-800 uppercase tracking-widest mb-2">Lliga</label>
            <input type="text" name="lliga" id="lliga" value="{{ old('lliga') }}"
                class="w-full bg-black border-red-900/40 text-gray-100 rounded-lg focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all" required>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-red-900/30 mt-8">
            <a href="{{ route('equips.index') }}" class="text-gray-500 hover:text-white transition-colors text-sm">
                ← Tornar
            </a>
            <button type="submit" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg shadow-lg transition-all uppercase tracking-widest">
                Guardar Equip
            </button>
        </div>
    </form>
</div>
@endsection