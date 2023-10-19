<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'post_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(PostClient::class, 'post_id');
    }
}
