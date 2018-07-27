@extends("wrapper")
@section("content")
{{Form::open()}}
 {{Form::label("type_of_question","Tipo de Pregunta")}}
    {{Form::select("type_of_question",$types,2,["class"=>"form-control","id"=>"selecttype"])}}
{{Form::close()}}
<button class="btn btn-primary" type="button" id="btcreate">Crear</button>
{{Form::open(["route"=>["questions.store",$topic], "id"=>"form"])}}
<div id="divider0"><hr/></div>
<div id="practice"></div>
{{Form::submit("Subir Pregunta",["class"=>"btn btn-primary", "id"=>"submitquestion"])}}
{{Form::close()}}
<script type="text/javascript">
            var numberofforms=0;
            var number=0;
            var questiontype;
            $(document).ready(function(){
                //validate
                $("#submitquestion").click(function(e){
                    $("#form").validate();
                });
                //invisilbe btadd
                $("#btadd").hide();
                $("#divider0").hide();
                $("#submitquestion").hide();

                $("#btcreate").on("click",crear);
                function crear(){
                    //make submit visible
                    $("#submitquestion").show();

                $("#btcreate").text("Cambiar");
                 let x=$("#selecttype").find(":selected").val();
                    $("#divider0").show();
                    $("#practice").load("{{route("questions.load")}}"+"?type="+x+"&topic="+{{$topic}}+"&number="+number+"&seriada=0");
                    jQuery("<hr>").appendTo($("#practice"));
                }
                });
</script>
@endsection