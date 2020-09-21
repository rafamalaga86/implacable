<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Session;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    protected function getValidationRequirements(int $exception_id = null)
    {
        return [
            'name'        => 'required|min:3|max:191|unique:exercises,name' . ($exception_id ? ',' . $exception_id : ''),
            'category'    => 'required|in:' . implode(',', Exercise::getCategoryValues()),
            'image_url'   => 'required|url',
            'description' => 'nullable',
        ];
    }


    public function index()
    {
        $user = Auth::user() ?? User::find(config('app.default_user_id'));
        $exercises = Exercise::allThatHaveSessions($user);

        return view('show_exercises_and_sessions', compact(['exercises', 'user']));
    }

    public function indexALl()
    {
        $exercises = Exercise::all();

        return view('show_exercises', compact(['exercises']));
    }


    public function create(Request $request)
    {
        return view('create_exercise');
    }


    public function store(Request $request)
    {
        $request->validate($this->getValidationRequirements());
        Exercise::create($request->all());

        return redirect()->route('home')->with('success', 'Exercise created successfully');
    }


    public function edit(Request $request, Exercise $exercise)
    {
        return view('edit_exercise', compact(['exercise']));
    }


    public function update(Request $request, Exercise $exercise)
    {
        $request->validate($this->getValidationRequirements($exercise->id));
        $exercise->update($request->all());

        return redirect()->route('home')->with('success', 'Exercise updated successfully');
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
