<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use Searchable;

    protected $fillable= ([''

    ]);

    public function system()
    {
        return $this->hasMany(System::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }


}
