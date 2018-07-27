        {{$seriada}}
        @include("question.types.auxiliary.partial_physical_examination")
        <!--SOLO PARA QUE SE TOME UN NAME-->
        {{Form::hidden("name_0")}}
        {{Form::hidden("typeofquestionid_0",$type)}}
        {{Form::hidden("topicid_0",$topic)}}
            <!-- AQUI VAMOS A AGREGAR LAS DEFINICIONES DEL CASO: SIGNOS VITALES, SINTOMAS FÍSICOS, ESTUDIOS DE LABORATORIO ETC, ETC ETC -->
        <div id="divextraforms">
        </div>
           {{Form::select("selectype2",$types,2,["class"=>"form-control", "id"=>"selectype2"])}}

        <div>
		<button class="btn btn-primary" type="button" id="btaddquestion">Añadir Pregunta</button>
        </div>
		<script type="text/javascript">
            number++;
            console.log(number);
            var optionnumber=2;
            $(document).ready(function(){
                $("#btaddquestion").on("click",addquestion);
                function addquestion(){
                    let selectedtype=$("#selectype2").find(":selected").val();
                    $("<div id=form_"+number+"></div>").load("{{route("questions.load")}}"+"?type="+selectedtype+"&topic="+{{$topic}}+"&number="+number+"&seriada=1").appendTo($("#divextraforms"));
                    $("#divextraforms").append($('<hr style="margin-top:10px"/>'));
                    number++;
                }
            });
        </script>