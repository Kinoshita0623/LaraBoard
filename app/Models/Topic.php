<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','text'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
