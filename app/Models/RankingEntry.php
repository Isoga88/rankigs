<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingEntry extends Model
{
    use HasFactory;

    protected $fillable = ['ranking_id', 'user_id', 'position', 'points'];

    public function ranking()
    {
        return $this->belongsTo(Ranking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}