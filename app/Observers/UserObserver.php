<?php

namespace App\Observers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Cache;

/**
 * User observer
 */
class UserObserver
{
    protected function shapeKey(User $user)
    {
        return 'user.' . $user->id;
    }


    /**
     * @param User $user
     */
    public function saved(User $user)
    {
        Cache::put($this->shapeKey($user), $user, 30 * 24 * 60 * 60);
    }


    /**
     * @param User $user
     */
    public function deleted(User $user)
    {
        Cache::forget($this->shapeKey($user));
    }


    /**
     * @param User $user
     */
    public function restored(User $user)
    {
        Cache::put($this->shapeKey($user), $user, 30 * 24 * 60 * 60);
    }


    /**
     * @param User $user
     */
    public function retrieved(User $user)
    {
        Cache::add($this->shapeKey($user), $user, 30 * 24 * 60 * 60);
    }
}
