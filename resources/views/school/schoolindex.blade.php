@extends("wrapper")
@section("content")
<div class="col-md-12">
    <div class="row">
        <div class="col-md-2">
            {{"DBinfo Version: ".\App\DBinfo::getVersion()}}
        </div>
        <div class="col-md-1 col-md-offset-9">
            <a href="{{action("SchoolController@create")}}"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
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
            @foreach($schools as $school)
                <tr>
                    <td><a href="{{route("subjects.index",[$school->id])}}">{{$school->name}}</a></td>
                    <td>{{$school->added_at_version}}</td>
                    <td>{{$school->updated_at_version}}</td>
                    <td>{{$school->deleted_at_version}}</td>
                    <td>
                        @if($school->to_update)
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