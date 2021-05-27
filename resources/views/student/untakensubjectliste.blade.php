@extends('dashboard')

@section('content')

    <br>
<div class="container">
    <h1>Available subjects</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Code</th>
            <th scope="col">Credit</th>
            <th scope="col">Teacher name</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
{{--        @if($count !=0)--}}



                @foreach($subjects as $subject)
                    @foreach($taken_subjects as $tsubject )
                    @if($subject->id==$tsubject->subject_id)

                @else

                <tr>
                    <th scope="row">{{$subject->id}}</th>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->description}}</td>
                    <td>{{$subject->sub_code}}</td>
                    <!--users represente la relation et name represente la colomn de la table users-->
                    <td>{{$subject->credit_val}}</td>
                    <td>{{$subject->users->name}}</td>
                    <td>
{{--                        <a class="btn btn-primary" href="{{route('savesubject',['id'=>$subject->id,'tn'=>$subject->users->name])}}">take subject</a>--}}
                        <a class="btn btn-primary" href="{{route('savesubject',$subject->id)}}">take subject</a>
                    </td>

                </tr>

                @endif

            @endforeach

        @endforeach


{{--        @elseif($count=0)--}}
{{--            @foreach($lists2 as $subject)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$subject->id}}</th>--}}
{{--                    <td>{{$subject->name}}</td>--}}
{{--                    <td>{{$subject->description}}</td>--}}
{{--                    <td>{{$subject->sub_code}}</td>--}}
{{--                    <!--users represente la relation et name represente la colomn de la table users-->--}}
{{--                    <td>{{$subject->credit_val}}</td>--}}
{{--                    <td>--}}
{{--                        <a class="btn btn-primary" href="{{route('savesubject',$subject->id)}}">take</a>--}}
{{--                    </td>--}}

{{--                </tr>--}}
{{--            @endforeach--}}

{{--            @else--}}


{{--        @endif--}}
        </tbody>


    </table>



    <h1>taken subjects</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
{{--            <th scope="col">Code</th>--}}
{{--            <th scope="col">Credit</th>--}}
{{--            <th scope="col">Details</th>--}}
        </tr>
        </thead>
        <tbody>
        {{--        @if($count !=0)--}}

        @foreach($taken_subjects as $subject)
            <tr>
                <th scope="row">{{$subject->subject_id}}</th>
                <td>{{$subject->users->name}}</td>
                <td>{{$subject->users->email}}</td>
{{--                <td>{{$subject->sub_code}}</td>--}}
{{--                <!--users represente la relation et name represente la colomn de la table users-->--}}
{{--                <td>{{$subject->credit_val}}</td>--}}
{{--                <td>--}}
{{--                    <a class="btn btn-primary" href="{{route('savesubject',$subject->id)}}">take</a>--}}
{{--                </td>--}}

            </tr>
        @endforeach
        </tbody>


    </table>
</div>
<!-- Optional JavaScript; choose one of the two! -->

@endsection
