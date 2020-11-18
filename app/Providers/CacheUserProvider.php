<?php

namespace App\Providers;

use App\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Facades\Cache;

/**
 * Class CacheUserProvider
 * @package App\Auth
 */
class CacheUserProvider extends EloquentUserProvider
{
    /**
     * CacheUserProvider constructor.
     * @param HasherContract $hasher
     */
    public function __construct(HasherContract $hasher)
    {
        parent::__construct($hasher, User::class);
    }

    /**
     * @param mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($id)
    {
        return Cache::get("user.$id") ?? $this->cacheAndGet($id);
    }

    protected function cacheAndGet($id)
    {
        $user = parent::retrieveById($id);
        Cache::put("user.$id", $user);
        return $user;
    }
}