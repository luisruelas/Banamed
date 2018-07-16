@if($seriada==0)
<div id="physicalexamination_{{$number}}">
	{{Form::label("physicalexamination_".$number, "Caso clínico")}}
	{{Form::text("physicalexamination_".$number,"",["class"=>"form-control"])}}
</div>
	<h3 id="labstext_{{$number}}">Laboratorios<button type="button" id="btaddlabs_{{$number}}" class="btn btn-primary">Añadir Lab</button></h3>
<div id="labs_{{$number}}">

</div>
<script type="text/javascript">
	$(document).ready(
		function(){
			labsnumber=0;
			$("#btaddlabs_{{$number}}").click(function(){
				div=jQuery("<div>",{
					id:"labs_{{$number}}_"+labsnumber
				});

				btnclosetab=jQuery("<button>",{
					class:"btn btn-danger",
					type:"button",
					id:"btncloselab_{{$number}}_"+labsnumber
				});
				btnclosetab.click(function(e){
					alert(e.target.id);
					id=e.target.id;
					formnumber=id.split("_")[1];
					labnumber=id.split("_")[2];

					$("#labs_"+formnumber+"_"+labnumber).remove();
					return false;
				});

				btnclosetab.html("quitar lab");
				var divresultado, divparametro;

				divparametro=jQuery("<div>",{
					style:"width:50%; float:left"
				});

				divresultado=jQuery("<div>",{
					style:"width:50%; float:left"
				});

				labelparametro=jQuery(("<label>Parametro</label>"),{
					for:"labparametro_{{$number}}_"+labsnumber,
					style:"width:100%"
				});
				inputparametro=jQuery(("<input>"),{
					type:"text",
					name:"labparametro_{{$number}}_"+labsnumber,
					class:"form-control",
					style:"width:100%"
				});
				labelresultado=jQuery(("<label>Resultado</label>"),{
					for:"labresultado_{{$number}}_"+labsnumber,
					style:"width:100%"
				});
				inputresultado=jQuery(("<input>"),{
					type:"text",
					name:"labresultado_{{$number}}_"+labsnumber,
					class:"form-control",
					style:"width:100%"
				});

				divparametro.append(labelparametro);
				divparametro.append(inputparametro);
				divresultado.append(labelresultado);
				divresultado.append(inputresultado);

				div.append(divparametro);
				div.append(divresultado);
				div.append(btnclosetab);
				
				$("#labs_{{$number}}").append(div);
				labsnumber++;
				

		}
		);
			}
		);


</script>
@endif