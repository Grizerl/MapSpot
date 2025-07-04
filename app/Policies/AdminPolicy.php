<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, User $model)
    {
        return $model->role == 'admin';
    }
}
