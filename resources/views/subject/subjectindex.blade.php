@extends("wrapper")
@section("content")
<div class="col-md-12">
    <a href="{{route("schools.index")}}">Escuelas</a>{{">".$school->name}}
    <div class="row">
        <div class="col-md-1 col-md-offset-11">
            <a href="{{action("SubjectController@create",[$school->id])}}"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
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
            @foreach($subjects as $subject)
                <tr>
                    <td><a href="{{route("topics.index",[$subject->id])}}">{{$subject->name}}</a></td>
                    <td>{{$subject->added_at_version}}</td>
                    <td>{{$subject->updated_at_version}}</td>
                    <td>{{$subject->deleted_at_version}}</td>
                    <td>
                        @if($subject->to_update)
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