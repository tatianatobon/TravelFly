<?php include('conexion.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>crear cuenta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://jeff-aporta.github.io/main/00Libs/Sites/sites.min.js"></script>
</head>

<body>
	<div>
        <nav class="navbar navbar-light" style="background-color: #00CAFC;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="Logotipo.png" alt="" width="55" height="55" class="rounded img-fluid d-inline-block align-text-top"></a>
                </div>
                <div class="navbar-nav mr-auto">
                    <a href=" "><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
                </div>
            </div>
        </nav>
    </div>

	<div class="contenedorCuadro">
		<br>
		<img src="Logotipo.png" style="display:block;margin:auto">

		<div class="contenedorFormulario">
			<form action="guardar_usuario.php" method="post">

				<input type="text" class="form-control" name="nombre" class="form-control" placeholder="Nombres" pattern="[A-Za-z-Zñóéí,.-]+" maxlength="30" required>

				<input type="text" class="form-control" name="apellido" class="form-control" placeholder="Apellidos" pattern="[A-Za-z-Zñóéí,.-]+" maxlength="30" required>

				<input type="text" class="form-control" name="documento" class="form-control" placeholder="Documento" pattern="[0-9]+" minlength="10" maxlength="10" required>

				<input type="text" class="form-control" name="celular" class="form-control" placeholder="Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>

					<label for="fechaNacimiento">Fecha nacimiento</label>
				  	<input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" required class="form-control" min = "1940-01-01" max = "2004-01-01">

				<select name="id_genero" style="width:38%; color: #515A5A;" >
						<?php
							$consulta_mysql='select * from genero';
							$resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
							while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
								echo "<option  value='".$lista["id_genero"]."'>";
								echo $lista["tipo_genero"];
								echo "</option>";
							}
						?>
				</select>
				<div style="display: inline-block;text-align: left;">
					<div style="text-align: center;">
						País
					</div>
					<img src="" id="flag" width="60px" style="vertical-align: top;">
					<select id="paises" name="pais "onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
				</div>
				<div style="display: inline-block;text-align: left;">
					Estado
					<br>
					<select id="estados" name="estado" onchange="actualizarCiudades()"></select>
				</div>
				<div style="display: inline-block;text-align: left;">
					Ciudad
					<br>
					<select id="ciudades" name="ciudad"></select>
				</div>

				<input type="text" name="direccion" placeholder="Dirección" required class="form-control" maxlength="30">

				<input type="text" class="form-control" name="email" class="form-control" placeholder="Correo electrónico"  maxlength="30">

				<input type="text" class="form-control" name="user" class="form-control" placeholder="Username"  maxlength="30">

				<input type="password" name="pass" placeholder="Contraseña" required class="form-control" maxlength="30">

				<input type="password" name="confirmPass" placeholder="Confirmar Contraseña" maxlength="30">


				<div class="file-select" id="src-file1" >
					<center>
						<input type="file" name="foto" aria-label="Archivo">
					</center>
				</div>

				<div class="botonRecuperar">
					<center>
						<button type="submit" class="botonCorto">Registrarse</button>
					</center>
				</div>
			</form>
		</div>
	</div>
	<br><br><br>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/formularios.js"></script>
</body>
</html>
<script>
actualizarPaises()
actualizarBandera()
actualizarEstados()
actualizarCiudades()

function actualizarPaises() {
     document.getElementById("paises").innerHTML = $optionPaises()
}

function actualizarBandera() {
     let flag = document.getElementById("flag");
     let pais = document.getElementById("paises").value;
     flag.src = $regiones[pais].flagSVG_4x3
}

function actualizarEstados() {
     let pais = document.getElementById("paises").value
     document.getElementById("estados").innerHTML = $optionEstados(pais)
}

function actualizarCiudades() {
     let pais = document.getElementById("paises").value
     let estado = document.getElementById("estados").value
     document.getElementById("ciudades").innerHTML = $optionCiudades(pais, estado)
}
</script>