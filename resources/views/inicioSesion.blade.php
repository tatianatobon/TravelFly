@extends('layouts.navegador')

@section('content')
<div class="contenedorCuadro col-sm-12 col-lg-3">

	<p style="text-align: center;"><img src="img/Logotipo.png" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
	<h2 style="text-align: center;">Acceder</h2>
	<div class="contenedorFormulario">
		<form action="/login" method="post" name="Formulario">
			{{ csrf_field() }}
			<input type="email" name="email"  class="form-control" required placeholder="Correo electrónico o usuario">
			<input type="password" name="pass" class= "form-control" placeholder="Contraseña" required>
			<div class="botonSesion">
				<button type="submit" class="botonLargo">Iniciar Sesión</button>	
			</div>	
		</form>
	</div>
	<div class="contenedorReferencias">
		<p style="font-size: small;"> 
			<a href="/registrarse" style="text-align: left;">Crear Cuenta </a>
			<a href="/recuperar-contrasena" style="margin-left: 15%;">¿Olvidaste tu contraseña? </a>
		</p>
	</div>
</div>

@endsection