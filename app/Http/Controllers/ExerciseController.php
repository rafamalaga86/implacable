<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Session;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user() ?? User::getById(config('app.default_user_id'));
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
        $details = $request->all();

        $details['image_name'] = $this->uploadNewImage($details['image_url'], $details['name']);

        Exercise::create($details);

        return redirect()->route('home')->with('success', 'Exercise created successfully');
    }


    public function edit(Request $request, Exercise $exercise)
    {
        return view('edit_exercise', compact(['exercise']));
    }


    public function update(Request $request, Exercise $exercise)
    {
        $request->validate($this->getValidationRequirements($exercise->id));
        $details = $request->all();

        $details['image_name'] = $this->uploadSubstituteImage($exercise, $details['image_url'], $details['name']);

        $exercise->update($details);

        return redirect()->route('home')->with('success', 'Exercise updated successfully');
    }


    protected function uploadNewImage(string $image_url, string $exercise_name): string
    {
        $tmp = preg_replace('/\?[^?]*$/', '', $image_url);
        $tmp = explode('.', $tmp);
        $extension = end($tmp);
        $file_name = str_slug($exercise_name) . '.' . $extension;

        while (Storage::exists($file_name)) {
            $file_name = $file_name . '-' . rand(10);
        }
        
        $successful_upload = Storage::put($file_name, file_get_contents($image_url));

        if (!$successful_upload) {
            return abort(500, 'There was a problem with the image upload to FTP server');
        }

        return $file_name;
    }


    protected function uploadSubstituteImage(Exercise $exercise, string $image_url, string $exercise_name): string
    {
        if ($image_url == $exercise->image_url) { // Case 0: The url of the image didn't change
            return $exercise->image_name; // Do nothing
        }

        list($file_name, $extension) = $this->getFilenameAndExtension($image_url, $exercise_name);
        $new_file_content = file_get_contents($image_url);
        $old_file_content = Storage::get($exercise->image_name);

        if ($new_file_content == $old_file_content) { // The content of the new file is the same
            return $exercise->image_name; // Do nothing
        }

        while (Storage::exists($file_name)) {
            $file_name = $file_name . '-' . rand(10);
        }

        $successful_upload = Storage::put($file_name, $new_file_content);

        if (!$successful_upload) {
            return abort(500, 'There was a problem with the image upload to FTP server');
        }

        Storage::delete($exercise->image_name);
        return $file_name;
    }


    protected function getFilenameAndExtension(string $image_url, string $exercise_name)
    {
        $tmp = preg_replace('/\?[^?]*$/', '', $image_url);
        $tmp = explode('.', $tmp);
        $extension = end($tmp);
        $file_name = str_slug($exercise_name) . '.' . $extension;

        return [$file_name, $extension];
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
