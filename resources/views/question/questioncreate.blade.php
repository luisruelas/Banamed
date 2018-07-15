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
{{Form::submit("Subir Pregunta")}}
{{Form::close()}}
<script type="text/javascript">
            var numberofforms=0;
            var number=0;
            $(document).ready(function(){
                //invisilbe btadd
                $("#btadd").hide();
                $("#divider0").hide();
                $("#btcreate").on("click",crear);
                function crear(){
                $("#btcreate").text("Cambiar");
                 let x=$("#selecttype").find(":selected").val();
                 seriada=0;
                 console.log("selected"+x);
                 console.log(x==1);
                 if(x==1){
                    seriada=1;
                 }else{
                    seriada=0;
                 }
                    $("#divider0").show();
                    $("#practice").load("{{route("questions.load")}}"+"?type="+x+"&topic="+{{$topic}}+"&number="+number+"&seriada="+seriada);
                    jQuery("<hr>").appendTo($("#practie"));
                }

                });
</script>
@endsection