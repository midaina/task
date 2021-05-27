@extends('dashboard')

@section('content')
    <div class="container">

{{--        <h3>Welcome  {{ Auth::user()->name }}</h3>--}}
{{--        <h3>Task Id  {{ $id }}</h3>--}}
        <h3>Task Name: <b> {{ $taskdetails->name }}</b></h3>
        <h3>Subject Name: <b> {{ $taskdetails->subjects->description }}</b></h3>
        <h3>Teacher Name: <b> {{ $taskdetails->subjects->users->name }}</b></h3>
        <h3>Points:  <b>{{ $taskdetails->points}}</b></h3>
        <br>
        <br>
        <h1>Add New Solution to the Task</h1>
        <form action="{{route('soformulaire',Auth::user()->id)}}" method="post" >
            @csrf
            <div class="mb-3">
                <input type="hidden"  class="form-control" id="task_id" name="task_id" value="{{$id}}">
            </div>

            <div class="mb-3">
                <label for="solution" class="form-label">Solution</label>
                <textarea class="form-control" id="solution" name="solution"></textarea>
                <span style="color:red">@error('solution'){{$message}}@enderror</span>
            </div>

{{--            <div class="mb-3">--}}
{{--                <label for="sub_date" class="form-label">Submit date</label>--}}
{{--                <input type="text" class="currentTime form-control" id="sub_date" name="sub_date">--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <label for="se" class="form-label">Student Email</label>--}}
{{--                <input type="text" class="form-control" value="{{Auth::user()->email}}" id="se" name="se" disabled>--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <label for="statut" class="form-label">Statut</label>--}}
{{--                <input type="text" class="form-control" id="statut" name="statut">--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <label for="earned_points" class="form-label">Earned Points</label>--}}
{{--                <input type="text" class="form-control" id="earned_points" name="earned_points">--}}
{{--            </div>--}}


{{--            <div class="mb-3">--}}
{{--                <label for="evaluation_time" class="form-label">Evaluation time</label>--}}
{{--                <input type="text" class="form-control" id="evaluation_time" name="evaluation_time">--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


@endsection
