<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'department_name',
        'department_id',
        'appointment_date',
        'taken',
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
