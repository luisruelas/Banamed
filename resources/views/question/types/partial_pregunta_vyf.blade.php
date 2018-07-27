        @include("question.types.auxiliary.partial_closetab")
        <div class="form-group">
            {{Form::hidden("typeofquestionid_".$number,$type)}}
            {{Form::hidden("topicid_".$number,$topic)}}
            {{Form::label("name_".$number,"*Pregunta*:",["style"=>"width:100%; float:left"])}}
            {{Form::text("name_".$number,null,["class"=>"form-control", "style"=>"float:left; width:100%"])}}
        </div>
        <div class="form-group">
            {{Form::label("explanation_".$number."_0","*Respuesta*:",["style"=>"width:100%; float:left"])}}
            </div>
            <div style="width:30%; float:left; text-align: center">
                <label for="option_{{$number}}_0">Verdadero</label></div>
        <div style="width:70%; float:left;text-align: center">
            <label for="option_{{$number}}_0">Falso</label></div>

        <div style="width:30%; float:left;text-align: center">
                <input type="radio" name="option_{{$number}}_0" value="1" class="form-control"></div>
        <div style="width:70%; float:left;text-align: center">
            <input type="radio" name="option_{{$number}}_0" value="0" class="form-control"></div>
        <div class="form-group">
            {{Form::label("explanation_".$number."_0","*Explicación*:",["style"=>"width:100%; float:left"])}}
            </div>
            {{Form::text("explanation_".$number."_0",null,["class"=>"form-control", "style"=>"float:left; width:100%; margin-bottom:25px"])}}
	    <script type="text/javascript">
        </script>