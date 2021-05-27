@extends('dashboard')

@section('content')
<br><br>
<div class="container">
    <h1>Subject Details</h1>

    <div class="mb-3">
        <p> Name :<b>{{$cl->name}}</b></p>
    </div>
    <div class="mb-3">
        <p>Description :<b>{{$cl->description}}</b></p>
    </div>
    <div class="mb-3">
        <p>Subject Code :<b>{{$cl->sub_code}}</b></p>
    </div>
    <div class="mb-3">
        <p> Credit value :<b>{{$cl->credit_val}}</b></p>
    </div>
    <div class="mb-3">
        <p> Date of creation :<b>{{$cl->created_at}}</b></p>
    </div>
    <div class="mb-3">
        <p>Last modification:<b>{{$cl->updated_at}}</b></p>
    </div>
    <div class="mb-3">
        <p>number of students on this subject:<b>{{$count}}</b></p>
    </div>


    <br>

    <h3><strong>list of task related</strong></h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Points</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cl->tasks as $task)
                <tr>
                    <td>  <a href="{{route('tdetails',$task->id)}}"> {{$task->name}} </a></td>
                    <td>{{$task->points}}</td>
                </tr>
            @endforeach


            </tbody>


        </table>
    <br><br>

    <a class="btn btn-primary" href="{{route('tnew',$cl->id)}}">New task</a>


    <br><br>
    <h3><strong>list of student assigned</strong></h3>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email Address</th>

        </tr>
        </thead>
        <tbody>
        @foreach( $students as $student)
            <tr>
                <td>  {{$student->users->name}}</td>
                <td>{{$student->users->email}}</td>
            </tr>
        @endforeach

        </tbody>


    </table>

    <a class="btn btn-primary" href="{{route('smodification',$cl->id)}}">Edit</a> / <a class="btn btn-danger" href="{{route('sdelete',$cl->id)}}">Delete the subject</a>
</div>


@endsection
