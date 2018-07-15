@extends("wrapper")
@section("content")
    <h2>NUEVA MATERIA</h2>
    <h2>Escuela: {{$school->name}}</h2>
    <hr/>
    {{Form::open([
    "route"=>["subjects.store",$school->id]
    ])}}
    <div class="form-group">
        {{Form::label("name","*Materia*:")}}
        {{Form::text("name",null,["class"=>"form-control"])}}
    </div>
    <div class="form-group">
        {{Form::submit("Subir",["class"=>"btn btn-primary"])}}
    </div>
    {{Form::close()}}
@endsection