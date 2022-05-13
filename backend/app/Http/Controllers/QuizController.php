<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionsGetRequest;
use App\Http\Requests\QuizSubmitRequest;
use App\Http\Resources\BinaryQuestionCollection;
use App\Http\Resources\GamePlayersCollection;
use App\Http\Resources\MultipleQuestionCollection;
use App\Http\Resources\MultipleQuestionResource;
use App\Models\Game;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quiz.index');
    }


    public function getQuestions(QuestionsGetRequest $request){

        $quizMode = $request->get('quizMode');

        if ($quizMode === 'boolean') {
            $questions = Question::getQuizQuestions(true);
            return response()->json(new BinaryQuestionCollection($questions));
        } elseif ($quizMode === 'multiple') {
            $questions = Question::getQuizQuestions(false);
            return response()->json(new MultipleQuestionCollection($questions));
        }
    }

    public function getCupInfo(){

        $players = Game::getGamesPlayed();

        return response()->json(new GamePlayersCollection($players));
    }

    public function submit(QuizSubmitRequest $request): \Illuminate\Http\JsonResponse
    {
        $startedAt      = Carbon::createFromTimestampMs($request->startTimestamp);
        $submittedAt    = Carbon::createFromTimestampMs($request->endTimestamp);

        $game = new Game();
        $game->timestamps = false;
        $game->player_first_name = $request->name;
        $game->player_last_name = $request->lastname;
        $game->email = $request->email;
        $game->correct_answers = $request->correct;
        $game->total_score = $request->totalAnswered;
        $game->started_at = $startedAt;
        $game->submitted_at	 = $submittedAt;
        $game->save();


        return response()->json(['success' => $request->getContent() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
