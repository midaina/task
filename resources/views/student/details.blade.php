@extends('dashboard')

@section('content')
<br><br>
<div class="container">
    <h1>Subject Details</h1>
    <div class="mb-3">
        <p> Name :<b>{{$subjects->name}}</b></p>
    </div>
    <div class="mb-3">
        <p>Description :<b>{{$subjects->description}}</b></p>
    </div>
    <div class="mb-3">
        <p> Code :<b>{{$subjects->sub_code}}</b></p>
    </div>
    <div class="mb-3">
        <p> Credit value:<b>{{$subjects->credit_val}}</b></p>
    </div>
    <div class="mb-3">
        <p> created_at:<b>{{$subjects->created_at}}</b></p>
    </div>
    <div class="mb-3">
        <p>last modification date:<b>{{$subjects->updated_at}}</b></p>
    </div>
    <div class="mb-3">
        <p> Number of assigned sutdent :<b>{{$count}}</b></p>
    </div>
    <div class="mb-3">
        <p> Teacher name :<b>{{$subjects->users->name}}</b></p>
    </div>
    <div class="mb-3">
        <p> Teacher Email:<b>{{$subjects->users->email}}</b></p>
    </div>
    <br>

    <h3><strong>list of student who have taken this subject</strong></h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Email Address</th>

        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>  <a href="{{route('tdetails',$student->users->id)}}"> {{$student->users->name}} </a></td>
                <td>{{$student->users->email}}</td>
{{--                <td> <a class="btn btn-primary" href="{{route('tnew',$subjects->id)}}">submit a solution </a></td>--}}
            </tr>
        @endforeach

        </tbody>


    </table>

    <h3><strong>list of task related</strong></h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Task id</th>
                <th scope="col">Task Name</th>
                <th scope="col">Points</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects->tasks as $task)

            <tr>
{{--                <td>  <a href="{{route('tdetails',$task->id)}}"> {{$task->name}} </a></td>--}}
                <td> {{$task->id}} </td>
                <td><a class="btn btn-link" href="{{route('sonew',$task->id)}}"> {{$task->name}} </a></td>
                <td>{{$task->points}}</td>
                <td>
                    @foreach($solutions as $solution)
{{--                @if($task->status==0)--}}
                @if($task->id==$solution->task_id && $solution->earned_points>0)
                    <p style="color:green"><b>Evaluated</b></p>
                            @break
                @else

{{--                            @break--}}
                @endif
{{--                    @continue--}}
                @endforeach

                </td>
            </tr>
            @endforeach

            </tbody>


        </table>
    <br><br>



    <br><br>

</div>


@endsection
