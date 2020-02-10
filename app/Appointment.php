<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //use Searchable;

    protected $fillable = [
        'customer_name', 'address','email', 'mobile_no', 'system','task', 'appointment_date','task_status',
    ];
    
    public function system()
    {
        return $this->hasMany(System::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsToOne(customer::class);
    }
}
