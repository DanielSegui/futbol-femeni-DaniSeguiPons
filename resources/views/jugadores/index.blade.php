@extends('layouts.equip')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-extrabold text-red-600 uppercase tracking-tighter">Jugadores</h2>

    @can('create', App\Models\Jugadora::class)
    <a href="{{ route('jugadores.create') }}" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow-lg transition-all transform hover:-translate-y-1 uppercase text-sm tracking-widest">
        + Nova jugadora
    </a>
    @endcan
</div>

<div class="bg-gray-950 shadow-2xl rounded-xl overflow-hidden border border-red-900/40">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Nom</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Posició</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Equip</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-center text-xs font-bold text-red-700 uppercase tracking-widest">Accions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-red-900/10">
            @forelse ($jugadores as $jugadora)
            <tr class="hover:bg-red-950/20 transition duration-150 ease-in-out">
                <td class="px-5 py-5 text-sm bg-gray-950">
                    <p class="text-white font-bold uppercase tracking-tight">{{ $jugadora->nom }}</p>
                </td>
                <td class="px-5 py-5 text-sm text-gray-100 bg-gray-950">
                    {{ $jugadora->posicio }}
                </td>
                <td class="px-5 py-5 text-sm text-gray-100 bg-gray-950">
                    {{ $jugadora->equip ? $jugadora->equip->nom : '-' }}
                </td>
                <td class="px-5 py-5 text-sm text-center bg-gray-950">
                    <div class="flex justify-center space-x-4">
                        @can('update', $jugadora)
                        <a href="{{ route('jugadores.edit', $jugadora) }}" class="text-yellow-500 hover:text-yellow-400 font-bold transition-colors">Editar</a>
                        @endcan

                        @can('delete', $jugadora)
                        <form action="{{ route('jugadores.destroy', $jugadora) }}" method="POST" class="inline-block" onsubmit="return confirm('Segur que vols eliminar aquesta jugadora?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-500 font-bold transition-colors">Eliminar</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-5 py-12 text-sm text-center text-gray-400 bg-gray-950 italic">
                    No hi ha jugadores registrades en la base de dades.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection