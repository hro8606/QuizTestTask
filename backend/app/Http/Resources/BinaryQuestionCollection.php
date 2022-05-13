<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BinaryQuestionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'results' => $this->collection->map(function ($data) {
                return [
                    'question' => $data->question,
                    'correct_answer' => $data->is_correct === 1 ? 'Yes' : 'No',
                    'incorrect_answers' => [
                        $data->is_correct === 0 ? 'Yes' : 'No'
                    ]
                ];
            })
        ];

    }
}
