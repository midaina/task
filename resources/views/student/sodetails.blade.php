@extends('dashboard')

@section('content')
    <br><br>
    <div class="container">
        <h1>Solution Details</h1>
        <div class="mb-3">
            <p> Solution:<b>{{$solution->solution}}</b></p>
        </div>
        <div class="mb-3">
            <p>Submission date :<b>{{$solution->sub_date}}</b></p>
        </div>
        <div class="mb-3">
            <p>Student email :<b>{{$solution->student_email}}</b></p>
        </div>
        <div class="mb-3">
            <p> Statut:<b>{{$solution->statut}}</b></p>
        </div>
        <div class="mb-3">
            <p>Earned points:<b>{{$solution->earned_points}}</b></p>
        </div>





    </div>


@endsection
