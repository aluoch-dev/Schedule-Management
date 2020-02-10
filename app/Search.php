<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
   protected $table = 'search';
   protected $fillable = ['name','password','email','number','date_of_birth']; 
}
