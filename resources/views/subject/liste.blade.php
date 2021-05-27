@extends('dashboard')

@section('content')
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
{{--            <th scope="col">Action</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
            <tr>
                <th scope="row">{{$list->id}}</th>
                <td><a href="{{route('sdetails',$list->id)}}">{{$list->name}}</a> </td>
                <td>{{$list->description}}</td>
                <td>{{$list->sub_code}}</td>
                <!--users represente la relation et name represente la colomn de la table users-->
                <td>{{$list->credit_val}}</td>
{{--                <td>--}}
{{--                    <a href="{{route('smodification',$list->id)}}">modifier</a>--}}
{{--                </td>--}}

            </tr>
        @endforeach

        </tbody>


    </table>

    <a class="btn btn-primary" href="{{route('snew')}}" role="button">New Subject</a>
</div>
<!-- Optional JavaScript; choose one of the two! -->

@endsection
