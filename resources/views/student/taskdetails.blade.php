@extends('dashboard')

@section('content')
    <br><br>
    <div class="container">
        <h1>Task Details</h1>
        <div class="mb-3">
            <p> Name :<b>{{$task->name}}</b></p>
        </div>
        <div class="mb-3">
            <p>Description :<b>{{$task->description}}</b></p>
        </div>
        <div class="mb-3">
            <p> Code :<b>{{$task->points}}</b></p>
        </div>
        <div class="mb-3">
            <p> Number of submitted solutions :<b>0</b></p>
        </div>
        <div class="mb-3">
            <p>Number of evaluated solutions:<b>0</b></p>
        </div>



        <br>
        <a href="{{route('sonew',$task->id)}}">Evaluate</a>
        <br>

        <!--Solutions of the Task-->
        <h3>list of solution related</h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student email</th>
                <th scope="col">Earned Point</th>
                <th scope="col">Evaluation Time</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($task->solutions as $solution)
                <tr>
                    <td>  {{$solution->sub_date}} </td>
                    <td>{{$solution->student_email}}</td>
                    <td>{{$solution->student_email}}</td>
                    <td>{{$solution->earned_points}}</td>
                    <td>{{$solution->evaluation_time}}</td>
                    @if($solution->statut==1)
                        <td>  <a href="{{route('sodetails',$solution->id)}}" style="color:green" ><b> Evaluated </b></a></td>
                    @else
                        <td>  <a href="{{route('sodetails',$solution->id)}}"> Evaluate </a></td>
                    @endif
                </tr>
            @endforeach

            </tbody>


        </table>


    </div>


@endsection
