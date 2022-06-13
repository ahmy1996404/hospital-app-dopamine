<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'header',
        'content',
        'service_id',
    ];
    /**
     * Relations
     * 
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
