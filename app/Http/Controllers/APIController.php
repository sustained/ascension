<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Course;

class APIController extends Controller
{
    /*
        Return all courses, unpaginated.
    */
    public function courses()
    {
        return Course::all();
    }

    /*
        Return course by ID, optionally with levels or levels + words.
    */
    public function course($id)
    {
        $load = Input::get('load');

        if ($load && in_array($load, ['levels', 'levels.words']))
            return Course::with(explode(',', $load))->find($id);

        return Course::find($id);
    }

    /*
        Return levels by course ID.
    */
    public function levels($id)
    {
        $load = Input::get('load');

        if ($load && in_array($load, ['course']))
            return Level::with(explode(',', $load))->find($id);

        return Level::find($id);
    }

    /*
        Return logged in user, for debugging.
    */
    public function user(Request $request)
    {
        return $request->user();
    }
}
