<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'files';

    protected $fillable = ['name', 'size', 'file', 'path', 'full_file', 'mime_type', 'file_type', 'relation_id',];

    protected $dates = ['deleted_at'];

    protected $appends = ['fullFilePath'];

    public function getFullFilePathAttribute()
    {
        return asset('storage/' . $this->full_file);
    }
}
