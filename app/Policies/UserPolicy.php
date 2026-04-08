<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->canManageUsers();
    }

    public function view(User $user, User $model)
    {
        return $user->canManageUsers() && $this->canModify($user, $model);
    }

    public function create(User $user)
    {
        return $user->canManageUsers();
    }

    public function update(User $user, User $model)
    {
        return $user->canManageUsers() && $this->canModify($user, $model);
    }

    public function delete(User $user, User $model)
    {
        return $user->canManageUsers() && $this->canModify($user, $model) && $user->id !== $model->id;
    }

    public function toggleStatus(User $user, User $model)
    {
        return $user->canManageUsers() && $this->canModify($user, $model) && $user->id !== $model->id;
    }

    private function canModify(User $currentUser, User $targetUser)
    {
        if ($currentUser->isSuperadmin()) {
            return $targetUser->role !== 'SUPERADMIN';
        } elseif ($currentUser->isAdmin()) {
            return $targetUser->role === 'EDITOR';
        }
        return false;
    }
}
