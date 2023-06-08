<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsService extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'icon',
        'about_us_id',

        'header',
        'content',
    ];
    /**
     * Relations
     * 
     */
    public function aboutUs()
    {
        return $this->belongsTo(AboutUs::class, 'about_us_id');
    }
}
