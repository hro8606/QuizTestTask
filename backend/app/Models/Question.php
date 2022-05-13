<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function createBinaryQuestion(string $question, bool $isCorrect): void
    {
        $this->question = $question;
        $this->is_binary = 1;
        $this->is_correct = $isCorrect;
        $this->save();
    }

    public function createMultipleQuestion(string $question): void
    {
        $this->question = $question;
        $this->is_binary = 0;
        $this->is_correct = null;
        $this->save();
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public static function getQuizQuestions(bool $isBinary)
    {
        return self::where('is_binary',(int)$isBinary)
            ->with('answers')
            ->limit(10)
            ->inRandomOrder()
            ->get();
    }

}
