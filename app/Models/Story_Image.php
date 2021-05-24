<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story_Image extends Model
{
    use HasFactory;

    protected $table = 'stories_images';

    protected $fillable = [
        'story_id',
        'image_name',
        'image',
        'image_audio',
        'vietsub',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
