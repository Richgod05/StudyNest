<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;
use App\Models\Like;


class Question extends Model
{
    protected $fillable = ['user_id', 'title', 'body', 'likes_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
