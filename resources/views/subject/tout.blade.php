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
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lists as $list)
                <tr>
                    <th scope="row">{{$list->id}}</th>
                    <td>{{$list->name}}</td>
                    <td>{{$list->description}}</td>
                    <td>{{$list->sub_code}}</td>
                    <!--users represente la relation et name represente la colomn de la table users-->
                    <td>{{$list->credit_val}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('sdetails',$list->id)}}">take</a> /
                    </td>

                </tr>
            @endforeach

            </tbody>


        </table>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

@endsection
