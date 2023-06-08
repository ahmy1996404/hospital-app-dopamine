<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ChatLog extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'attach'
    ];
    protected $appends = [
        'attach_url',
        'has_attach',
        'has_content',
        'has_message'
    ];
    /**
     * Relations
     * 
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
    public function reciver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function getAttachUrlAttribute()
    {
        return $this->attach ? Storage::url($this->attach) : null;
    }
    public function getHasAttachAttribute()
    {
        return $this->attach ? true : false;
    }
    public function getHasContentAttribute()
    {
        return ($this->attach||$this->message) ? true : false;
    }
    public function getHasMessageAttribute()
    {
        return $this->message ? true : false;
    }
}
