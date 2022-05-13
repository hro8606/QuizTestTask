@extends('layouts.dashboard')

@section('content')

    <div class="container">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.questions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="question" class="col-form-label">Question:</label>
                    <input type="text" class="form-control" name="question" id="question">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Question Type:</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="radio" name="questionType" id="questionType" checked="" value="0">
                            <label for="questionType">
                                Binary (Yes/No)
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="questionType" name="questionType" value="1">
                            <label for="questionType">
                                Multiple choice
                            </label>
                        </div>
                    </div>
                </div>
                <div class="answerTypeBinary">
                    <div class="form-group">
                        <label for="binary_correct_answer" class="col-form-label">Correct Answer (YES or NO) :</label>
                        <select class="custom-select rounded-0" id="binary_correct_answer" name="binary_correct_answer">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>
                </div>
                <div class="answerTypeMultiple" style="display: none;">
                    <div class="form-group">
                        <label for="answer_1" class="col-form-label">Answer 1 :</label>
                        <input type="text" class="form-control" name="answers[1]" id="answer_1">
                    </div>
                    <div class="form-group">
                        <label for="answer_2" class="col-form-label">Answer 2 :</label>
                        <input type="text" class="form-control" name="answers[2]" id="answer_2">
                    </div>
                    <div class="form-group">
                        <label for="answer_3" class="col-form-label">Answer 3 :</label>
                        <input type="text" class="form-control" name="answers[3]" id="answer_3">
                    </div>
                    <div class="form-group">
                        <label for="correct_answer" class="col-form-label">Chose Correct Answer</label>
                        <select class="custom-select rounded-0" name="correct_answer" id="correct_answer">
                            <option value="1">Answer 1</option>
                            <option value="2">Answer 2</option>
                            <option value="3">Answer 3</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
