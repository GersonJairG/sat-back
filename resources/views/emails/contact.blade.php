@extends('/emails/plantilla-base')

@section('formulario')
	
	<form action="{{ route('send-to-contact') }}" method="POST">	
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<label>Nombre:</label>
    	<input type="text" name="name" id="name" placeholder="nombre">
		<br>
    	<label>Correo:</label>
    	<input type="email" name="email" id="email" placeholder="example@gmail.com" value="jairguerrerosilvera@gmail.com">
		<br>
		<label>Comentario:</label>
    	<textarea name="text" id="text" rows="4" cols="50" placeholder="Texto por defecto"></textarea>
		<br>
    	<button type="submit">Enviar</button>
	</form>
@stop
