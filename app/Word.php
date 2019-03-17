<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public $timestamps = true;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
