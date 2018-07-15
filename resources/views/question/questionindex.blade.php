@extends("wrapper")
@section("content")
<div class="col-md-12">
    <a href="{{route("schools.index")}}">Escuelas</a>{{">"}}
    <a href="{{route("subjects.index",[$school->id])}}">{{$school->name}}</a>{{">"}}
    <a href="{{route("topics.index",[$subject->id])}}">{{$subject->name}}</a>{{">"}}
    {{$topic->name}}
    <div class="row">
        <div class="col-md-1 col-md-offset-11">
            <a href="{{action("QuestionController@create",[$topic->id])}}"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Nombre</th>
                <th>V.Ag</th>
                <th>V.Mod</th>
                <th>V.Rem</th>
                <th>To_update</th>
            </tr>
            @foreach($questions as $question)
                <tr>
                    <td><a href="{{route("questions.show",[$topic->id,$question])}}">{{$question->name}}</a></td>
                    <td>{{$question->added_at_version}}</td>
                    <td>{{$question->updated_at_version}}</td>
                    <td>{{$question->deleted_at_version}}</td>
                    <td>
                        @if($question->to_update)
                            <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


</div>
    @endsection()