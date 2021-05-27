@extends('dashboard')

@section('content')
<div class="container">


    <h1><b>New Subject</b> </h1>
    <form action="{{route('sformulaire',Auth::user()->id)}}" method="post" >
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="clinic name">
            <span style="color:red">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="sub_code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" id="sub_code" name="sub_code">
            <span style="color:red">@error('sub_code'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="credit_val" class="form-label">Credit Value</label>
            <input type="text" class="form-control" id="credit_val" name="credit_val">
            <span style="color:red">@error('credit_val'){{$message}}@enderror</span>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</div>


@endsection
