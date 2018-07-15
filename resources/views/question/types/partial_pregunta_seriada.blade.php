
        <div id="form_0" class="form-group">
            {{Form::label("name_".$number,"*Pregunta*:",["style"=>"width:100%; float:left"])}}
            {{Form::text("name_".$number,null,["class"=>"form-control", "style"=>"float:left; width:100%"])}}
        </div>
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