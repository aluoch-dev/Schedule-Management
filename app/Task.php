<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //use Searchable;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
