<?php

namespace App\Policies;

use App\Models\Equip;
use App\Models\User;

class EquipPolicy
{
    public function viewAny(?User $user): bool { return true; }

    public function view(?User $user, Equip $equip): bool { return true; }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    public function update(User $user, Equip $equip): bool
    {
        if ($user->role === 'admin') return true;
        return $user->role === 'manager' && $user->team_id === $equip->id;
    }

    public function delete(User $user, Equip $equip): bool
    {
        if ($user->role === 'admin') return true;
        return $user->role === 'manager' && $user->team_id === $equip->id;
    }
}