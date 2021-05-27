@extends('dashboard')

@section('content')
    <br><br>
    <div class="container">
        <h1>Solution Details</h1>
        <form action="{{route('solutionpoint',$solution->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="hidden" value="{{$solution->task_id}}" name="task_id">
                <input type="hidden" value="{{$solution->sotasks->points}}" name="task_points">
            </div>
        <div class="mb-3">
            <p> Task description:<b>{{$solution->sotasks->description}}</b></p>
        </div>
        <div class="mb-3">
            <p> Solution:<b>{{$solution->solution}}</b></p>
        </div>
        <div class="mb-3">
            <p>Submission date :<b>{{$solution->sub_date}}</b></p>
        </div>
        <div class="mb-3">
            <p>Student email :<b>{{$solution->student_email}}</b></p>
        </div>
{{--        <div class="mb-3">--}}
{{--            <p> Statut:<b>{{$solution->statut}}</b></p>--}}
{{--        </div>--}}
        <div class="mb-3">
{{--            <p>Earned points:<b>{{$solution->earned_points}}</b></p>--}}
            <p>Earned points:<b><input type="number" class="form-control" name="earned_points"> </b></p>
            <span style="color:red">@error('earned_points'){{$message}}@enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save the point</button>
        </form>
    <br>




    </div>


@endsection
