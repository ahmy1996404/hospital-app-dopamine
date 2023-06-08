<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'doctor_id',
        'user_id',
        'date',
        'time',
        'status',
        'type',
    ];
    /**
     * Relations
     * 
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class , 'doctor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function report(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AppointmentReport::class, 'appointment_id', 'id');
    }
}
