<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'header',
        'thumbnail_img',
        'header_img',
        'content',
        'category_id',

    ];
    /**
     * Relations
     * 
     */

    public function category() 
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
