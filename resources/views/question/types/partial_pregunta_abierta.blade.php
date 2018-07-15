        @include("question.types.auxiliary.partial_closetab")
        <div class="form-group">
            {{Form::label("name_".$number,"*Pregunta*:",["style"=>"width:100%; float:left"])}}
            {{Form::text("name_".$number,null,["class"=>"form-control", "style"=>"float:left; width:100%"])}}
        </div>
        <div class="form-group">
            {{Form::label("option_".$number."_0","*Respuesta*:",["style"=>"width:50%; float:left"])}}
            {{Form::label("explanation_".$number."_0","*Explicación*:",["style"=>"width:50%; float:left"])}}
            {{Form::text("explanation_".$number."_0",null,["class"=>"form-control", "style"=>"float:left; width:50%"])}}
            {{Form::text("option_".$number."_0",null,["class"=>"form-control", "style"=>"float:left; width:50%"])}}
        </div>
	    <script type="text/javascript">
        </script>