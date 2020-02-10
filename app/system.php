<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    //use Searchable;
    
    public function appointment()
    {
       return $this->hasMany(Appointment::class);
    }
    
    public function user()
    {
        return $this->hasMany(Customer::class);
    }


}
