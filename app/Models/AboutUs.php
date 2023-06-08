<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'header',
        'content',
    ];
    /**
     * Relations
     * 
     */
    public function service()
    {
        return $this->hasMany(AboutUsService::class, 'about_us_id');
    }

}
