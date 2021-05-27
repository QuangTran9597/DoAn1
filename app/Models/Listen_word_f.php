<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listen_word_f extends Model
{
    use HasFactory;

    protected $table = 'listen_wrongs';

    protected $fillable = [
        'listen_audio_id',
        'word_false',
        'status_false',
    ];

    public function listen()
    {
        return $this->belongsTo(Listen::class);
    }
}
