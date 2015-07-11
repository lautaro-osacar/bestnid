<!-- Vista de las preguntas y respuestas de subastador como usuario -->

<legend><h4><center>Preguntas al subastador</center></h4></legend>

<style>
input#respuesta-txt{
	float:left;
	width: 80%;
	margin-left: 20px;
}

#respuesta-icon{
	float:left;
	margin-top: 7px;
}

#respuesta-btn{
	float:left;
	margin-left: 10px;
}
</style>

<div id="preguntas">
		@foreach ($subasta->preguntas as $pregunta_id => $pregunta)
		<table class="table table-bordered preguntas-table">
				<tr class="pregunta">
					<td>
						<span class="glyphicon glyphicon-question-sign"></span>
						&nbsp;&nbsp;{{$pregunta->texto}}
					</td>
				</tr>
				@if(!isset($pregunta->respuesta->texto))
					<tr class="respuesta">
						<td style="padding-left:25px;">
							<span class="glyphicon glyphicon-arrow-right" id="respuesta-icon"></span>
							<input type="text" class="form-control" id="respuesta-txt" placeholder="Ingrese aquí su respuesta">
							<button type="submit" class="btn btn-primary" id="respuesta-btn">Responder</button>
						</td>
					</tr>
				@else
					<tr class="respuesta">
						<td style="padding-left:25px;">
							<span class="glyphicon glyphicon-arrow-right"></span>
							&nbsp;&nbsp;{{$pregunta->respuesta->texto}}
						</td>
					</tr>
				@endif
		</table>
		@endforeach
	
</div>
