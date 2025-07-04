<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, User $model): bool
    {
        return $model->role == 'admin';
    }
}
