<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use HasFactory , SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Relations
     * 
     */
    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'speciality_id', 'id');
    }
}
