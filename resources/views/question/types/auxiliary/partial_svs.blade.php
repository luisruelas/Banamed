<div id="divintsvs_{{$number}}">
{{Form::label("fc_$number","FC:",["style"=>"float:left; margin-right:10px"])}}
{{Form::text("fc_$number","",["class"=>"form-control","style"=>"width:10%"])}}
{{Form::label("fr_$number","FR:",["style"=>"float:left; margin-right:10px"])}}
{{Form::text("fr_$number","",["class"=>"form-control","style"=>"width:10%"])}}
{{Form::label("temp_$number","°C:",["style"=>"float:left; margin-right:10px"])}}
{{Form::text("temp_$number","",["class"=>"form-control","style"=>"width:10%"])}}
{{Form::label("tas_$number","TA:",["style"=>"float:left; margin-right:10px"])}}
{{Form::text("tas_$number","",["class"=>"form-control","style"=>"width:5%; float:left"])}}
{{Form::text("tad_$number","",["class"=>"form-control","style"=>"width:5%"])}}
	<button id="btclosesvs_{{$number}}" type="button" class="btn btn-danger">Quitar Signos</button>
</div>
<script type="text/javascript">
	$(document).ready(
		function(){
			$("#btclosesvs_"+{{$number}}).click(
				function(e){
					formnumber=e.target.id.split("_")[1];
					$("#divintsvs_"+{{$number}}).remove();
				}
				);
		}
		);
</script>