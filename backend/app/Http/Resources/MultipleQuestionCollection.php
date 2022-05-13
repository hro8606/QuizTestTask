<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MultipleQuestionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'results' => $this->collection->map(function ($question) {

                $incorrectAnswers = $question->answers->where('is_correct',0);
                $correctAnswer = $question->answers->where('is_correct',1)->first();
                return [
                    'question' => $question->question,
                    'correct_answer' => $correctAnswer->text,
                    'incorrect_answers' => $incorrectAnswers->pluck('text')
                ];
            })
        ];
    }
}
