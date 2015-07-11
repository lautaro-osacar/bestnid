<!-- Vista de las preguntas y respuestas de usuario que oferta -->

<legend><h4><center>Preguntas al subastador</center></h4></legend>

@if( !Auth::guest())
	<div id="preguntar">
		{!! Form::open(['action'=>'PreguntaController@store','class' => 'form-horizontal','id' => 'formPreguntar']) !!}
			<center><textarea id="preguntar-txt" name="preguntar-txt" rows="2"></textarea>
			<input type="hidden" value="{{$subasta->id}}" name="subasta_id"/>
			<button type="submit" class="btn btn-primary" id="preguntar-btn">Preguntar</button>
		{!! Form::close() !!}
		</center>
	</div>
@endif

<div id="preguntas">
		@foreach ($subasta->preguntas as $i => $pregunta)
			<table class="table table-bordered preguntas-table">
				<!-- Si la pregunta corresponde al usuario la pinto de verde -->
				@if(Auth::user() and $pregunta->user_id == Auth::user()->id)
					<tr class="pregunta success">
				@else
					<tr class="pregunta">
				@endif
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
