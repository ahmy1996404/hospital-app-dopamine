<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'speciality_id',
        'doctor_info',
        'user_id',
        'clinic_address'
    ];
    /**
     * Relations
     * 
     */
    public function speciality()
    {
        return $this->belongsTo(Speciality::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function workingHours()
    {
        return $this->hasMany(DoctorWorkingHours::class);
    }
    public function workingHoursVideo()
    {
        return $this->hasMany(DoctorWorkingHoursVideo::class);
    }
    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}

