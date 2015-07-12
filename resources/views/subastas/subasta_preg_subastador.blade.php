<!-- Vista de las preguntas y respuestas de subastador como usuario -->

<legend><h4><center>Preguntas al subastador</center></h4></legend>

<style>
.respuesta-txt{
	float:left;
	width: 80%;
	margin-left: 20px;
}

.respuesta-icon{
	float:left;
	margin-top: 7px;
}

.respuesta-btn{
	float:left;
	margin-left: 10px;
}

.respondido-txt{
	float:left;
	margin-left: 10px;
}

.respondido-icon{
	float:left;
	margin-left: 10px;
}

</style>

<div id="preguntas">
		@foreach ($subasta->preguntas as $pregunta)
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
							<span class="glyphicon glyphicon-arrow-right respuesta-icon" id="respuesta-icon-{{$pregunta->id}}"></span>
							{!! Form::open(['route' => 'respuesta.store','method'=>'POST','id'=>'form-rta-{{$pregunta->id}}']) !!}
								<input type="text" class="form-control respuesta-txt" pregunta="{{$pregunta->id}}" id="respuesta-txt-{{$pregunta->id}}" name='texto' placeholder="Ingrese aquí su respuesta">
								<div class="btn btn-primary respuesta-btn" pregunta="{{$pregunta->id}}" id="respuesta-btn-{{$pregunta->id}}">Responder<div>
							{!! Form::close() !!}
						</td>
					</tr>
				@else
					<tr class="respuesta">
						<td style="padding-left:25px;">
							<span class="glyphicon glyphicon-arrow-right respondido-icon" id="respondido-icon"></span>
							<div class='respondido-txt'>{{$pregunta->respuesta->texto}}</div>
						</td>
					</tr>
				@endif
		</table>
		@endforeach
</div>
