<?php

namespace App\Http\Controllers;

use App\Services\EquipService;
use App\Http\Requests\StoreEquipRequest;
use App\Models\Equip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // <--- 1. AÑADE ESTA LÍNEA

class EquipController extends Controller
{
    protected $equipService;

    public function __construct(EquipService $equipService)
    {
        $this->equipService = $equipService;
    }

    public function index()
    {
        $equips = $this->equipService->all();
        return view('equips.index', compact('equips'));
    }

    public function show($id)
    {
        $equip = $this->equipService->find($id);
        return view('equips.show', compact('equip')); 
    }

    public function create()
    {
        // 2. CAMBIA $this->authorize POR Gate::authorize
        Gate::authorize('create', Equip::class);
        return view('equips.create');
    }

    public function store(StoreEquipRequest $request)
    {
        Gate::authorize('create', Equip::class);
        $this->equipService->create($request->validated());
        return redirect()->route('equips.index')->with('success', 'Equip creat.');
    }

    public function edit(Equip $equip)
    {
        Gate::authorize('update', $equip);
        return view('equips.edit', compact('equip'));
    }

    public function update(StoreEquipRequest $request, Equip $equip)
    {
        Gate::authorize('update', $equip);
        $this->equipService->update($equip->id, $request->validated());
        return redirect()->route('equips.index')->with('success', 'Equip actualitzat.');
    }

    public function destroy(Equip $equip)
    {
        Gate::authorize('delete', $equip);
        $this->equipService->delete($equip->id);
        return redirect()->route('equips.index')->with('success', 'Equip eliminat.');
    }
}