@extends('dashboard')

@section('content')
<div class="container">

    <h3>Welcome  {{ Auth::user()->name }}</h3>

    <h1>Add New Subject</h1>
    <form action="{{route('sformulaire',Auth::user()->id)}}" method="post" >
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="clinic name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="sub_code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" id="sub_code" name="sub_code">
        </div>
        <div class="mb-3">
            <label for="credit_val" class="form-label">Credit Value</label>
            <input type="text" class="form-control" id="credit_val" name="credit_val">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</div>


@endsection
