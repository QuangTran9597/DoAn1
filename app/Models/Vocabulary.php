<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'vocabulary_name',
        'vocabulary_image',
        'vocabulary_audio',
        'vietsub',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
