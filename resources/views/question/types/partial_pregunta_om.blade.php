        @include("question.types.auxiliary.partial_closetab")
        @include("question.types.auxiliary.partial_physical_examination")
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
        <div class="form-group">
            {{Form::label("option_".$number."_1","*Opción",["style"=>"width:50%; float:left"])}}
            {{Form::label("explanation_".$number."_1","*Explicación*:",["style"=>"width:50%; float:left"])}}
            {{Form::text("explanation_".$number."_1",null,["class"=>"form-control", "style"=>"float:left; width:50%"])}}
            {{Form::text("option_".$number."_1",null,["class"=>"form-control", "style"=>"float:left; width:50%"])}}
        </div>
        <div id='{{"divextraoption_".$number}}'>
        </div>
    <div id="identifier" style="width:100%" class="form-group">
		<button class="btn btn-primary" type="button" id='{{"btaddoption_".$number}}' style="">Añadir Opción</button>
	</div>
		<script type="text/javascript">
            $(document).ready(function(){

            	var optionnumber=2;

            	$("#btaddoption_"+{{$number}}).click(function(){
            		div=jQuery("<div>",{
            			id:"divoption_{{$number}}_"+optionnumber
            		});
                    labeloption=jQuery("<label>",{
                        for:"option_"+{{$number}}+"_"+optionnumber,
                        style:"width:50%; float:left; text-align:left"
                    });
                    labeloption.html("Opción");
                    labelexplanation=jQuery("<label>",{
                        for:"explanation_"+{{$number}}+"_"+optionnumber,
                        style:"width:45%; float:left"
                    });
                    labelexplanation.html("Explicación");
                    inputoption=jQuery("<input>",{
                        id:"option_"+{{$number}}+"_"+optionnumber,
                        name:"option_"+{{$number}}+"_"+optionnumber,
                        class:"form-control",
                        style:"width:50%; float:left"
                    });
                    inputexplanation=jQuery("<input>",{
                        id:"explanation_"+{{$number}}+"_"+optionnumber,
                        name:"explanation_"+{{$number}}+"_"+optionnumber,
                        class:"form-control",
                        style:"width:45%; float:left"
                    });
                    divbtnclose=$('<div style="width:5%; float:right"></div>');
                    btncloseoption=jQuery("<i>",{
                    	class:"fa fa-times",
                    	id:"btncloseoption_{{$number}}_"+optionnumber
                    });
                    divbtnclose.append(btncloseoption);
                    btncloseoption.click(function(event){
                    	id=event.target.id;
                    	idsplitted=id.split("_");
                    	$("#divoption_"+idsplitted[1]+"_"+idsplitted[2]).remove();
                    });
                    optionnumber+=1;
                    div.append(labeloption);
                    div.append(labelexplanation);
                    div.append(inputoption);
                    div.append(inputexplanation);
					div.append(divbtnclose);
                    $("#divextraoption_"+{{$number}}).append(div);
            	})
            });

        </script>