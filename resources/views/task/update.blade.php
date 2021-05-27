@extends('dashboard')

@section('content')
    <div class="container">

        <h3>Welcome  {{ Auth::user()->name }}</h3>
        <h3>Task Id  {{$task->id }}</h3>
        <h1>Add New Task</h1>
        <form action="{{route('tmodifie',$task->id)}}" method="post" >
            @csrf
            <div class="mb-3">
                <input type="hidden"  class="form-control" id="subject_id" name="subject_id" value="{{$task->id}}">

            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{$task->name}}" name="name" aria-describedby="task name">
                <span style="color:red">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{$task->description}}</textarea>
                <span style="color:red">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="points" class="form-label">Points</label>
                <input type="text" class="form-control" id="points" value="{{$task->points}}" name="points">
            </div>


            <div class="mb-3">
                <input type="hidden" class="form-control" id="user_id" value="{{$task->user_id}}" name="user_id">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="subject_id" value="{{$task->subject_id}}" name="subject_id">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>


@endsection
