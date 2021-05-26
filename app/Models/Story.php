<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_name',
        'story_title',
        'story_content',
        'story_image',
        'link',
    ];

    public function story_images()
    {
        return $this->hasMany(Story_Image::class, 'story_id');
    }
}
