		<div id="divclose_{{$number}}">
			@if($seriada)
				<i class="fa fa-times" id="btncloseform_{{$number}}"></i>
			@endif
		</div>
		<script type="text/javascript">
            $(document).ready(
                function(){
                    $("#btncloseform_{{$number}}").click(function()
                        {
                        $("#form_{{$number}}").remove();
                        }
                        );
                }
                );
        </script>