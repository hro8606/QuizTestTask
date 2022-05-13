<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsAndAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionsMultiple = [
            [
                'question' => "question 1 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => "question 2 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'question' => "question 3 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'question' => "question 4 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 5 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 6 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 7 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 8 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 9 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 10 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 11 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'question' => "question 12 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'question' => "question 13 multiple",
                'is_binary' => '0',
                'is_correct' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($questionsMultiple as $key => $question)
        {
            $question = Question::create($question);
            $answersArray =[
                [
                    'question_id' => $question->id,
                    'text' => 'Answer' . $key . '1',
                    'is_correct' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'question_id' => $question->id,
                    'text' => 'Answer' . $key . '2',
                    'is_correct' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'question_id' => $question->id,
                    'text' => 'Answer' . $key . '3',
                    'is_correct' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];

            $answers = Answer::insert($answersArray);

        }

        $binaryQuestionsArray =  [
            [
                'question' => "question 1 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 2 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 3 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 4 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 5 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 6 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 7 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 8 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 9 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 10 binary",
                'is_binary' => '1',
                'is_correct' => '1',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 11 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 12 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ],
            [
                'question' => "question 13 binary",
                'is_binary' => '1',
                'is_correct' => '0',
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ]
        ];
        Question::insert($binaryQuestionsArray);
    }
}
