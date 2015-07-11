<!-- Vista de las preguntas y respuestas de usuario que oferta -->

<legend><h4><center>Preguntas al subastador</center></h4></legend>

@if( !Auth::guest())
	<div id="preguntar">
		<center><textarea id="preguntar-txt" name="preguntar" rows="2"></textarea>
		<a href="#" class="btn btn-primary" role="button" id="preguntar-btn">Preguntar</a>
		</center>
	</div>
@endif

<div id="preguntas">
		@foreach ($subasta->preguntas as $pregunta_id => $pregunta)
			<table class="table table-bordered preguntas-table">
				<tr class="pregunta">
					<td>
						<span class="glyphicon glyphicon-question-sign"></span>
						&nbsp;&nbsp;{{$pregunta->texto}}
					</td>
				</tr>
				@if(isset($pregunta->respuesta->texto))
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
