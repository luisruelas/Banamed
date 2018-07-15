@extends("wrapper")
@section("content")
    <h2>NUEVO TEMA</h2>
    <h4>{{$subject->name}}</h4>
    <h2>Escuela: {{$subject->school->name}}</h2>
    <hr/>
    {{Form::open([
    "route"=>["topics.store",$subject->id]
    ])}}
    <div class="form-group">
        {{Form::label("name","*Tema*:")}}
        {{Form::text("name",null,["class"=>"form-control"])}}
    </div>
    <div class="form-group">
        {{Form::submit("Subir",["class"=>"btn btn-primary"])}}
    </div>
    {{Form::close()}}
@endsection