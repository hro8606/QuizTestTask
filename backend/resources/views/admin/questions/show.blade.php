@extends('layouts.dashboard')

@section('content')
    <div class="container main-content-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Question show') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr class="thead-light">
                                <th>ID</th>
                                <th>Question</th>
                                <th>Mode</th>
                                @if ($question->is_binary === 1)
                                    <th>Correct Answer</th>
                                @endif
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->question}}</td>
                                    @if ($question->is_binary === 1)
                                        <td>Binary</td>
                                        <td>{{ $question->is_correct == 1 ? 'YES' : 'NO' }}</td>
                                    @else
                                        <td>Multiple choice</td>
                                    @endif
                                    <td>{{$question->created_at}}</td>
                                </tr>
                        @if (count($question->answers))
                                <tr  class="thead-light">
                                    <th></th>
                                    <th colspan="2">Answers</th>
                                    <th>Correct answer</th>
                                </tr>
                            @foreach ($question->answers as $ans)
                                <tr>
                                    <td>{{$ans->id}}</td>
                                    <td colspan="2">{{$ans->text}}</td>
                                    @if ($ans->is_correct === 1)
                                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
