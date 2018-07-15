@extends("wrapper")
@section("content")
    <h2>NUEVA ESCUELA</h2>
    <hr/>
    {{Form::open([
    "route"=>["schools.store"]
    ])}}
    <div class="form-group">
        {{Form::label("name","*Escuela*:")}}
        {{Form::text("name",null,["class"=>"form-control"])}}
    </div>
    <div class="form-group">
        {{Form::submit("Subir",["class"=>"btn btn-primary"])}}
    </div>
    {{Form::close()}}
@endsection