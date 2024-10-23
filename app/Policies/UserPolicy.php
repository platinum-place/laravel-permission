<?php

namespace App\Policies;

use App\Enums\ActionEnum;
use App\Enums\ModelEnum;
use App\Enums\RoleEnum;
use App\Models\user;

class UserPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole(RoleEnum::admin->value)) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionToAction(ActionEnum::viewAny->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasPermissionToAction(ActionEnum::view->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionToAction(ActionEnum::create->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasPermissionToAction(ActionEnum::update->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasPermissionToAction(ActionEnum::delete->name, ModelEnum::user->name);
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionToAction(ActionEnum::deleteAny->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasPermissionToAction(ActionEnum::restore->name, ModelEnum::user->name);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasPermissionToAction(ActionEnum::forceDelete->name, ModelEnum::user->name);
    }
}
