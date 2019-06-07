<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Course;

class APIController extends Controller
{
    public function courses()
    {
        return Course::all();
    }

    public function course($id)
    {
        $load = Input::get('load');

        if ($load && in_array($load, ['levels', 'levels.words']))
            return Course::with(explode(',', $load))->find($id);

        return Course::find($id);
    }

    public function levels($id)
    {
        $load = Input::get('load');

        if ($load && in_array($load, ['course']))
            return Level::with(explode(',', $load))->find($id);

        return Level::find($id);
    }
}
