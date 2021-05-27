@extends('dashboard')

@section('content')

    <br>
<div class="container">
    <h1>My subjects</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Subject Code</th>
            <th scope="col">Credit Value</th>
            <th scope="col">Teacher's name</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
{{--            @if( $list->subject_id == $list->subjects->id )--}}
            <tr>
                <th scope="row">{{$list->subjects->id}}</th>
                <td><a href="{{route('stdetails',$list->subjects->id)}}">{{$list->subjects->name}}</a></td>
                <td>{{$list->subjects->description}}</td>
                <td>{{$list->subjects->sub_code}}</td>

                <td>{{$list->subjects->credit_val}}</td>
                <!--subjects et users representent les relations et name represente la colomn de la table users-->
                <td>{{$list->subjects->users->name}}</td>
                <td>

                    <a class="btn btn-danger" href="{{route('leave',$list->id)}}">Leave subject</a>
                </td>

            </tr>
{{--            @else--}}

{{--           @endif--}}
        @endforeach

        </tbody>


    </table>
    <a class="btn btn-primary" href="{{route('untakensubjectlist')}}" role="button">Take a new subject</a>
</div>
<!-- Optional JavaScript; choose one of the two! -->

@endsection
