<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public static function getGamesPlayed()
    {
        return self::limit(10)
            ->orderBy('correct_answers','DESC')
            ->orderByRaw('submitted_at - started_at ASC')
            ->get();
    }
}
