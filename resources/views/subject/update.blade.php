@extends('dashboard')

@section('content')
<div class="container">
    <h1>Update Subject</h1>
    <form action="{{route('smodifie',$cl->id)}}" method="post" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$cl->name}}" aria-describedby="clinic name">
            <span style="color:red">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>


                <textarea class="form-control" name="description">{{$cl->description}}</textarea>


        </div>
        <div class="mb-3">
            <label for="sub_code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" value="{{$cl->sub_code}}" id="sub_code" name="sub_code">
            <span style="color:red">@error('sub_code'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="credit_val" class="form-label">credit value</label>
            <input type="text" class="form-control" value="{{$cl->credit_val}}" id="credit_val" name="credit_val">
            <span style="color:red">@error('credit_val'){{$message}}@enderror</span>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <br><br>
</div>

@endsection
