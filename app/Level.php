<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
