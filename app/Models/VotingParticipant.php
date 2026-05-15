<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingParticipant extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}