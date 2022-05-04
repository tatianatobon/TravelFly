@extends('layouts.navegador')

@section('content')

<div class="contenedorCuadro col-sm-12 col-lg-3">
		<p style="text-align: center;"><img src="img/Logotipo.png" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
		<h2 style="text-align: center;">Recuperacion de contraseña</h2>
		<div class="contenedorFormulario">
			<form  method="post" name="Formulario" action="/recuperar">
                {{ csrf_field() }}
				<input type="email" name="correo" required placeholder="Ingrese el Cor reo electronico" class="form-control">
				<div class="botonRecuperar">
					<button type="submit" class="botonCorto">Siguiente</button>
				</div>
			</form>
		</div>
	</div>

@endsection