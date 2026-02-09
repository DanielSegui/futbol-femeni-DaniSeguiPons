@extends('layouts.equip')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-extrabold text-red-600 uppercase tracking-tighter">Estadis</h2>

    @can('create', App\Models\Estadi::class)
    <a href="{{ route('estadis.create') }}" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow-lg transition-all transform hover:-translate-y-1 uppercase text-sm tracking-widest">
        + Nou estadi
    </a>
    @endcan
</div>

<div class="bg-gray-950 shadow-2xl rounded-xl overflow-hidden border border-red-900/40">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Nom</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Ciutat</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Capacitat</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Equip principal</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-center text-xs font-bold text-red-700 uppercase tracking-widest">Accions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-red-900/10">
            @forelse($estadis as $estadi)
            <tr class="hover:bg-red-950/20 transition duration-150 ease-in-out">
                <td class="px-5 py-5 text-sm bg-gray-950">
                    <p class="text-white font-bold uppercase tracking-tight">{{ $estadi->nom }}</p>
                </td>
                <td class="px-5 py-5 text-sm text-gray-100 bg-gray-950">
                    {{ $estadi->ciutat }}
                </td>
                <td class="px-5 py-5 text-sm text-gray-100 bg-gray-950 font-mono">
                    {{ number_format($estadi->capacitat, 0, ',', '.') }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950 font-semibold text-white">
                    {{ $estadi->equipPrincipal ? $estadi->equipPrincipal->nom : '-' }}
                </td>
                <td class="px-5 py-5 text-sm text-center bg-gray-950">
                    <div class="flex justify-center space-x-4">
                        @can('update', $estadi)
                        <a href="{{ route('estadis.edit', $estadi) }}" class="text-yellow-500 hover:text-yellow-400 font-bold transition-colors">Editar</a>
                        @endcan

                        @can('delete', $estadi)
                        <form action="{{ route('estadis.destroy', $estadi) }}" method="POST" class="inline-block" onsubmit="return confirm('Segur que vols eliminar aquest estadi?');">
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
                <td colspan="5" class="px-5 py-12 text-sm text-center text-gray-400 bg-gray-950 italic">
                    No hi ha estadis registrats.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection