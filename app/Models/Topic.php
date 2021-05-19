<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id' ,
        'topic_name',
        'topic_title',
        'topic_content',
        'topic_image',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function vocabularies()
    {
        return $this->hasMany(Vocabulary::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
