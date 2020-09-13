<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['user_id', 'exercise_id', 'date', 'sets', 'reps', 'level', 'weight'];

    protected $dates = ['created_at', 'updated_at', 'date'];


    /**
     * Get the CREATOR of the exercise.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function fetchByDate(User $user, int $limit = null, int $offset = null)
    {
        $query_builder = Session::selectRaw("date, GROUP_CONCAT(exercises.name) as exercises")
            ->join('exercises', 'sessions.exercise_id', 'exercises.id')
            ->where('sessions.user_id', $user->id)
            ->groupBy('date')
            ->orderBy('date');

        if ($limit) {
            $query_builder->take($limit);
        }

        if ($offset) {
            $query_builder->skip($offset);
        }
                
        return $query_builder->get();
    }
}

 // $table->unsignedBigInteger('user_id'); // Who made the exercise
 //            $table->unsignedBigInteger('exercise_id'); // Which exercise made
 //            $table->date('date');
 //            $table->unsignedTinyInteger('sets');
 //            $table->unsignedTinyInteger('reps');
 //            $table->unsignedTinyInteger('level')->nullable();
 //            $table->unsignedTinyInteger('weight')->nullable();