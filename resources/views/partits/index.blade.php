@extends('layouts.equip')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-extrabold text-red-600 uppercase tracking-tighter">Partits</h2>

    @can('create', App\Models\Partit::class)
    <a href="{{ route('partits.create') }}" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow-lg transition-all transform hover:-translate-y-1 uppercase text-sm tracking-widest">
        + Nou partit
    </a>
    @endcan
</div>

<div class="bg-gray-950 shadow-2xl rounded-xl overflow-hidden border border-red-900/40">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Local</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Visitant</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Estadi</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">Data</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-center text-xs font-bold text-red-700 uppercase tracking-widest">Resultat</th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-center text-xs font-bold text-red-700 uppercase tracking-widest">Accions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-red-900/10">
            @forelse ($partits as $partit)
            <tr class="hover:bg-red-950/20 transition duration-150 ease-in-out">
                <td class="px-5 py-5 text-sm bg-gray-950 font-bold text-white uppercase tracking-tight">
                    {{ $partit->local->nom ?? '-' }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950 font-bold text-white uppercase tracking-tight">
                    {{ $partit->visitant->nom ?? '-' }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950 text-gray-100">
                    {{ $partit->estadi->nom ?? '-' }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950 text-gray-100 font-mono">
                    {{ \Carbon\Carbon::parse($partit->data)->format('d/m/Y H:i') }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950 font-black text-center text-red-500 text-lg">
                    {{ $partit->resultat ?? '-' }}
                </td>
                <td class="px-5 py-5 text-sm text-center bg-gray-950">
                    <div class="flex justify-center items-center space-x-4">
                        <a href="{{ route('partits.acta', $partit) }}" class="text-red-600 hover:text-red-400 font-bold transition-colors" title="Descarregar PDF">
                            📄 <span class="underline">PDF</span>
                        </a>

                        @can('update', $partit)
                        <a href="{{ route('partits.edit', $partit) }}" class="text-yellow-500 hover:text-yellow-400 font-bold transition-colors">Editar</a>
                        @endcan

                        @can('delete', $partit)
                        <form action="{{ route('partits.destroy', $partit) }}" method="POST" class="inline-block" onsubmit="return confirm('Segur que vols eliminar aquest partit?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700 hover:text-red-500 font-bold transition-colors">Eliminar</button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-12 text-sm text-center text-gray-500 bg-gray-950 italic">
                    No hi ha partits registrats.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection