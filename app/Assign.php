<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
     protected $fillable = [
         'email', 'message',
     ];

     public function appointment()
     {
         return $this->belongsTo(Appointments::class);
     }

    /*public function user()
     {
         return $this->belongsToOne(Users::class);
     }
     */
    
}
