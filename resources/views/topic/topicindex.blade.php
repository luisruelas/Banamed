@extends("wrapper")
@section("content")
<div class="col-md-12">
    <a href="{{route("schools.index")}}">Escuelas</a>{{">"}}
    <a href="{{route("subjects.index",[$school->id])}}">{{$school->name}}</a>{{">"}}
    {{$subject->name}}
    <div class="row">
        <div class="col-md-1 col-md-offset-11">
            <a href="{{action("TopicController@create",[$subject->id])}}"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Nombre</th>
                <th>V.Ag</th>
                <th>V.Mod</th>
                <th>V.Rem</th>
                <th>to_update</th>
            </tr>
            @foreach($topics as $topic)
                <tr>
                    <td><a href="{{route("questions.index",[$topic->id])}}">{{$topic->name}}</a></td>
                    <td>{{$topic->added_at_version}}</td>
                    <td>{{$topic->updated_at_version}}</td>
                    <td>{{$topic->deleted_at_version}}</td>
                    <td>
                        @if($topic->to_update)
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