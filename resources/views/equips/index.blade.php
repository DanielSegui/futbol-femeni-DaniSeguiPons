@extends('layouts.equip')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-extrabold text-red-600 uppercase tracking-tighter">Equips</h2>

    {{-- Només es mostra si tens permís per CREAR --}}
    @can('create', App\Models\Equip::class)
    <a href="{{ route('equips.create') }}" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow-lg transition-all transform hover:-translate-y-1 uppercase text-sm tracking-widest">
        + Nou equip
    </a>
    @endcan
</div>

<div class="bg-gray-950 shadow-2xl rounded-xl overflow-hidden border border-red-900/40">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">
                    Escut
                </th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">
                    Nom
                </th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">
                    Ciutat
                </th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">
                    Lliga
                </th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-left text-xs font-bold text-red-700 uppercase tracking-widest">
                    Estadi
                </th>
                <th class="px-5 py-4 border-b border-red-900/50 bg-black text-center text-xs font-bold text-red-700 uppercase tracking-widest">
                    Accions
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-red-900/10">
            @forelse($equips as $equip)
            <tr class="hover:bg-red-950/20 transition duration-150 ease-in-out">
                <td class="px-5 py-5 text-sm bg-gray-950">
                    @if($equip->escut)
                    <img src="{{ asset('storage/' . $equip->escut) }}" alt="Escut {{ $equip->nom }}" class="h-10 w-10 rounded-full object-cover border border-red-900/30">
                    @else
                    <span class="text-gray-600 italic">Sense escut</span>
                    @endif
                </td>
                <td class="px-5 py-5 text-sm font-bold text-gray-100 bg-gray-950">
                    {{ $equip->nom }}
                </td>
                <td class="px-5 py-5 text-sm text-gray-400 bg-gray-950">
                    {{ $equip->ciutat }}
                </td>
                <td class="px-5 py-5 text-sm bg-gray-950">
                    {{-- Mantenemos el VERDE y fondo claro para la Lliga --}}
                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                        <span class="relative">{{ $equip->lliga }}</span>
                    </span>
                </td>
                <td class="px-5 py-5 text-sm text-gray-400 bg-gray-950">
                    {{ $equip->estadi ? $equip->estadi->nom : '-' }}
                </td>
                <td class="px-5 py-5 text-sm text-center bg-gray-950">
                    <div class="flex justify-center items-center space-x-4">

                        {{-- BOTÓ VEURE: Ahora en ROJO elegante --}}
                        <a href="{{ route('equips.show', $equip) }}" class="text-red-600 hover:text-red-400 font-bold transition-colors" title="Veure detalls">
                            Veure
                        </a>

                        @can('update', $equip)
                        <a href="{{ route('equips.edit', $equip) }}" class="text-yellow-600 hover:text-yellow-500 font-bold transition-colors">Editar</a>
                        @endcan

                        @can('delete', $equip)
                        <form action="{{ route('equips.destroy', $equip) }}" method="POST" class="inline-block" onsubmit="return confirm('Segur que vols eliminar aquest equip?');">
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
                <td colspan="6" class="px-5 py-10 text-sm text-center text-gray-600 bg-gray-950 italic">
                    No hi ha equips registrats.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection