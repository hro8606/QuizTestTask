@extends('layouts.dashboard')

@section('content')
    <div class="container main-content-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Questions') }}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <a href="{{route('admin.questions.create')}}"
                                       class="btn btn-block btn-primary buttonAddQuestion">Create</a>
                                </div>
                            </div>
                        </div>

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
                            <tr>
                                <th>N</th>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Mode</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->question}}</td>


                                    @if ($question->is_binary === 1)
                                        <td>Binary</td>
                                    @else
                                        <td>Multiple choice</td>
                                    @endif
                                    <td>
                                        <span><a href="{{route('admin.questions.show',$question)}}"
                                                 class="btn btn-block btn-primary btn-xs buttonSeeAnswers">View</a></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$questions->links('pagination::bootstrap-4')}}

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
