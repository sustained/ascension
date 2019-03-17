<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
