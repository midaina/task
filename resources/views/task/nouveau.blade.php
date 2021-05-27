@extends('dashboard')

@section('content')
    <div class="container">
{{--        {{$errors}}--}}
{{--        @if($errors->any())--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}
{{--            @endforeach--}}
{{--        @endif--}}

        <h1>New Task</h1>
        <br>
        <form action="{{route('tformulaire',Auth::user()->id)}}" method="post" >
            @csrf
            <div class="mb-3">
                <input type="hidden"  class="form-control" id="subject_id" name="subject_id" value="{{$id}}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="clinic name">
                <span style="color:red">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
                <span style="color:red">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="points" class="form-label">Points</label>
                <input type="text" class="form-control" id="points" name="points">
            </div>
            <div class="mb-3">
                <label for="credit_val" class="form-label">Credit Value</label>
                <input type="text" class="form-control" id="credit_val" name="credit_val">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>


@endsection
