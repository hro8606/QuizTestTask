<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    public static function insertAnswers(int $questionId,array $answersArray,int $correctAnswer)
    {
        $finalArray = [];
        foreach ($answersArray as $key => $answer)
        {
            $finalArray[] = [
                'question_id' => $questionId,
                'text' => $answer,
                'is_correct' => $correctAnswer === $key ? 1 : 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        self::insert($finalArray);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

}
