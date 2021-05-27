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
            <th scope="col">Code</th>
            <th scope="col">Credit</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lists2 as $list)
            <tr>
                <th scope="row">{{$list->id}}</th>
                <td>{{$list->name}}</td>
                <td>{{$list->description}}</td>
                <td>{{$list->sub_code}}</td>
                <!--users represente la relation et name represente la colomn de la table users-->
                <td>{{$list->credit_val}}</td>
                <td>
                    <a class="btn btn-link" href="{{route('sdetails',$list->id)}}">view</a> /
                    <a class="btn btn-danger" href="{{route('sdetails',$list->id)}}">leave</a>
                </td>

            </tr>
        @endforeach

        </tbody>


    </table>
    <a class="btn btn-primary" href="{{route('untakensubjectlist')}}" role="button">Take a new subject</a>
</div>
<!-- Optional JavaScript; choose one of the two! -->

@endsection
