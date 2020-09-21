<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function update(Request $request, Session $session)
    {
            // 'exercise_id' => 'required|numeric|exists:App\Exercise',
        $session->update($request->all());

        return back()->with('success', 'The session was updated successfully');
    }

    public function store(Request $request, Session $session)
    {
        $request->validate([
            'sets'        => 'required|numeric|min:1|max:100',
            'reps'        => 'required|numeric|min:1|max:1000',
            'weight'      => 'nullable|numeric|min:1|max:1000',
            'level'       => 'nullable|numeric|min:1|max:10',
            'exercise_id' => 'required|numeric|exists:App\Exercise,id',
            'user_id'     => 'required|numeric|exists:App\User,id',
        ]);

        $details = $request->all();

        if (!$request->filled('date')) {
            $details['date'] = Carbon::today();
        }

        $success = Session::create($details);

        return $success ? back()->with('success', 'Session added successfully') : back()->with('error', 'Sessions wasn\'t added');
    }


    public function indexByExercise(Exercise $exercise)
    {
        $sessions = $exercise->getSessionsByUser(Auth::user() ?? User::find(config('app.default_user_id')));

        return view('session_index', compact(['sessions', 'exercise']));
    }

    public function indexSessionsByDay(Request $request)
    {
        $day_sessions = Session::fetchGroupedByDate(Auth::user(), 30);

        return view('sessions_by_day', compact(['day_sessions']));
    }


    public function indexInDate(Request $request)
    {
        $user = Auth::user() ?? User::find(config('app.default_user_id'));
        $exercise_ids = Session::where('date', $request->input('date'))->get()->pluck('exercise_id');
        $exercises = Exercise::whereIn('id', $exercise_ids)->get();

        return view('show_exercises_and_sessions', compact(['exercises', 'user']));
    }
}

/*

Actions Handled By Resource Controller
Verb    URI Action  Route Name
GET /photos index   photos.index
GET /photos/create  create  photos.create
POST    /photos store   photos.store
GET /photos/{photo} show    photos.show
GET /photos/{photo}/edit    edit    photos.edit
PUT/PATCH   /photos/{photo} update  photos.update
DELETE  /photos/{photo} destroy photos.destroy
