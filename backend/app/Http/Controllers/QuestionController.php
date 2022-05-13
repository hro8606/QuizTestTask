<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\QuestionsStoreRequest;
use App\Models\Answer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): View
    {
        $questions = Question::paginate(10);
        return view('admin.questions.index')->with(array('questions' => $questions));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuestionsStoreRequest $request): RedirectResponse
    {
        $question = new Question();
        if ($request->questionType) {
            $question->createMultipleQuestion($request->question);
            Answer::insertAnswers($question->id,$request->answers,(int)$request->correct_answer);
        }else{
            $question->createBinaryQuestion($request->question,$request->binary_correct_answer);
        }
        Session::flash('message','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->load('answers');
        return view('admin.questions.show')->with(array('question' => $question));
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
