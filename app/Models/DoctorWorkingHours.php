<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorWorkingHours extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'doctor_id',
        'day',
        'from',
        'to',

    ];
    /**
     * Relations
     * 
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class , 'doctor_id');
    }
}
