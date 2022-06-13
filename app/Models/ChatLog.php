<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatLog extends Model
{
    use HasFactory;
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
}
