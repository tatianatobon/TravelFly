<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="en">
  	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	    <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <!-- Data Table -->
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	    <!-- Icons -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	    <title>Crear Cuenta</title>
  	</head>
  	<body>
    	<div>
        	<nav class="navbar navbar-inverse navbar-dark bg-primary">
        		<div class="container-fluid">
        			<div class="navbar-header">
        				<a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"></a>
        			</div>
        			<div class="navbar-nav mr-auto">
        				<a href="inicioSesion.html" style="color: #FFFFFF;">Volver <i class="bi bi-arrow-return-right"></i></a>
        			</div>
        		</div>
        	</nav>
        </div>
        <div class="contenedorCuadro">
        	<div class="contenedorFormulario">
        		<img src="img/Logotipo.png" style="display:block;margin:auto">
        		<form action="guardar_usuario.php" method="post" enctype="multipart/form-data" id="formulario-register" >
        			<label>Nombres</label>
					<div class="nombre">
        				<input type="text" class="form-control" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéí ]+" maxlength="30" required>
					</div>
			        <label>Apellidos</label>
					<div class="apellido">
						<input type="text" class="form-control" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéí ]+" maxlength="30" required>
					</div>
			        

			        <label>Documento</label>
			        <input type="text" class="form-control" name="documento" class="form-control" placeholder="Ingresa tu numero de Documento" pattern="[0-9]+" minlength="10" maxlength="10" required>

			        <label>Numero de celular</label>
			        <input type="text" class="form-control" name="celular" class="form-control" placeholder="Ingresa tu Numero de Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>

			        <label>Fecha nacimiento</label>
			        <input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" required class="form-control" min = "1940-01-01" max = "2004-01-01">

			        <label>Genero</label><br>
			        <select name="id_genero" style="width:38%; color: #515A5A;">
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
			        <br>

			        <div style="display: inline-block;text-align: left;">
			          	<div style="text-align: left;">País Nacimiento</div>
			          		<img src="" id="flag" width="40px" style="vertical-align: top;">
			          		<select id="paises" name="pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
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
			        <br>

			        <label>Direccion</label><br>
			        <input type="text" name="direccion" placeholder="Ingresa tu Direccion" class="form-control" maxlength="30" required>

			        <label>Email</label><br>
			        <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo" maxlength="30" required>

			        <label>Usuario</label><br>
			        <input type="text" class="form-control" name="user" class="form-control" placeholder="Crea un Usuario"  maxlength="30" required>

			        <label>Contraseña</label><br>
			        <input type="password" name="pass" placeholder="Ingresa una Contraseña"  class="form-control" maxlength="30" pattern=".{8,}" required>
			        <spam> "la contraseña debe contener 8 caracteres"</spam><br>
			        <label>Confirmar Contraseña</label><br>
			        <input type="password" name="confirmPass" placeholder="Confirma la Contraseña" class="form-control" maxlength="30" pattern=".{8,}" >

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

	    <!-- JQuery -->
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	    <!-- Bootstrap js -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	    <!-- Paises,Departamentos y Ciudades -->
	    <script src="https://jeff-aporta.github.io/main/00Libs/Sites/sites.min.js"></script>
		<!-- formulario.js -->
		<script src="js/formularios.js"></script>
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
    </body>
</html>