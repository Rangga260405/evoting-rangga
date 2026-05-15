<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nomor_urut',
        'nama_ketua',
        'nama_wakil',
        'foto',
        'visi',
        'misi',
        'vote_count',
    ];
}