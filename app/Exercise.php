<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Exercise extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'category', 'image_url', 'description', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The values the category enum can have
     * @var array
     */
    protected static $category_values = ['calisthenics', 'free weights', 'machines'];


    public static function getCategoryValues(): array
    {
        return self::$category_values;
    }


    /**
     * Get the CREATOR of the exercise.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get all the sessions of this exercise made by the User
     * @param User $user
     * @return Collection
     */
    public function getSessionsByUser(User $user, int $limit = null): Collection
    {
        return Session::where('user_id', $user->id)
            ->where('exercise_id', $this->id)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }


    /**
     * Fetch all exercises that have sessions
     * @return type
     */
    public static function allThatHaveSessions(User $user): Collection
    {
        $session_ids = DB::table('sessions')->select('exercise_id')->distinct()->get()->pluck('exercise_id')->toArray();

        return  Exercise::whereIn('id', $session_ids)->get();
    }
}
