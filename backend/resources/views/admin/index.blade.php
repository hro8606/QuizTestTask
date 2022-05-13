@extends('layouts.dashboard')

@section('content')
{{--@todo center this h1--}}
<div class="container main-content-container">
    <div class="row">
        <div class="d-flex justify-content-center"><h1 class="">Welcome {{$adminName}}</h1></div>
    </div>
    <div class="row">
        <span><h4>It's an <strong>Admin dashboard</strong>. <br>You can add questions by clicking to <strong>"Questions"</strong> button in navigation bar on left ,<br>
And also you can see history of players at the same place by clicking <strong>"Guest History"</strong></h4></span>
        <br><br>
        <span><h5>Have a good day )</h5></span>
    </div>
</div>

@endsection
