<?php

namespace App\Observers;

use App\Enums\ActionEnum;
use App\Enums\Log\LogLevelEnum;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $user->logging(LogLevelEnum::warning, ActionEnum::update);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $user->logging(LogLevelEnum::alert, ActionEnum::delete);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $user->logging(LogLevelEnum::info, ActionEnum::restore);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
