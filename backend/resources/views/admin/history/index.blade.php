@extends('layouts.dashboard')

@section('content')
    <div class="container main-content-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('History') }}</h3>
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
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Total Score</th>
                                <th>Unanswered questions</th>
                                <th>Quiz submit date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($history as $history_row)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td>{{$history_row->player_first_name}}</td>
                                    <td>{{$history_row->player_last_name}}</td>
                                    <td>{{$history_row->email}}</td>
                                    <td>{{$history_row->total_score}}</td>
                                    <td>{{ 10-$history_row->correct_answers}}</td>
                                    <td>{{ $history_row->submitted_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$history->links('pagination::bootstrap-4')}}

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
