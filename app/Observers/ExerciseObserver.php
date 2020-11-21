<?php

namespace App\Observers;

use App\Exercise;
use Illuminate\Support\Facades\Cache;

/**
 * Exercise observer
 */
class ExerciseObserver
{
    protected function shapeKey(Exercise $exercise)
    {
        return 'exercise.' . $exercise->id;
    }

    /**
     * @param Exercise $exercise
     */
    public function saved(Exercise $exercise)
    {
        Cache::put($this->shapeKey($exercise), $exercise, 30 * 24 * 60 * 60);
    }

    /**
     * @param Exercise $exercise
     */
    public function deleted(Exercise $exercise)
    {
        Cache::forget($this->shapeKey($exercise));
    }

    /**
     * @param Exercise $exercise
     */
    public function restored(Exercise $exercise)
    {
        Cache::put($this->shapeKey($exercise), $exercise, 30 * 24 * 60 * 60);
    }

    /**
     * @param Exercise $exercise
     */
    public function retrieved(Exercise $exercise)
    {
        Cache::add($this->shapeKey($exercise), $exercise, 30 * 24 * 60 * 60);
    }
}
