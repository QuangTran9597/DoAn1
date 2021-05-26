<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listen_word extends Model
{
    use HasFactory;

    protected $table = 'listen_words';

    protected $fillable = [
        'listen_audio_id',
        'word_true',
        'status_true',
        'word_false',
        'status_false',
    ];

    public function listen()
    {
        return $this->belongsTo(Listen::class);
    }
}
