<?php

namespace App\Observers;

use App\Session;
use Illuminate\Support\Facades\Cache;

/**
 * Session observer
 */
class SessionObserver
{
    protected function shapeKey(Session $session)
    {
        return 'session.' . $session->id;
    }


    /**
     * @param Session $session
     */
    public function saved(Session $session)
    {
        Cache::put($this->shapeKey($session), $session, 30 * 24 * 60 * 60);
    }

    /**
     * @param Session $session
     */
    public function deleted(Session $session)
    {
        Cache::forget($this->shapeKey($session));
    }

    /**
     * @param Session $session
     */
    public function restored(Session $session)
    {
        Cache::put($this->shapeKey($session), $session, 30 * 24 * 60 * 60);
    }

    /**
     * @param Session $session
     */
    public function retrieved(Session $session)
    {
        Cache::add($this->shapeKey($session), $session, 30 * 24 * 60 * 60);
    }
}
