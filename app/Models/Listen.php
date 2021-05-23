<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'listen_name',
        'listen_audio',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function listens_words()
    {
        return $this->hasMany(Listen_word::class, 'listen_audio_id');
    }

    public function listens_wors_f()
    {
        return $this->hasMany(Listen_word_f::class, 'listen_audio_id');
    }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }



}
