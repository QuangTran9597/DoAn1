<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = [
        'listen_id',
        'name',
        'telephone',
        'message',
    ];

    public function listen()
    {
        return $this->belongsTo(Listen::class);
    }
}
