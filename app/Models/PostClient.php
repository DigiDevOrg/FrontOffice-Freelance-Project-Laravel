<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostClient extends Model
{
    use HasFactory;
    protected $fillable = [ "title",'user_id', "picture", "content" ];
    public function comments()
{
    return $this->hasMany(CommentClient::class);
}
}
