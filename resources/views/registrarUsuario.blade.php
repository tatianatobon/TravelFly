@extends('layouts.navegador')

@section('content')
       <!-- formulario de registro -->
        <div class="contenedorCuadro">
        	<div class="contenedorFormulario">
			    <p style="text-align: center;"><img src="img/Logotipo.png" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
        	    <form onsubmit="return valida_envia()" action="/guardarusuario" method="post" enctype="multipart/form-data" id="formulario-register" name="fvalida" >
					{{ csrf_field() }}
                    <div class="campos-vacios">
                        <div class="nombre">
                            <label>Nombres</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required />
                        </div>
                        <div class="apellido">
                            <label>Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"class="form-control"  placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required value>
                        </div>		
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
                            $resultado_consulta_mysql = DB::select("select * from genero");
                            foreach($resultado_consulta_mysql as $lista){
                                echo "<option  value='".$lista->id_genero."'>";
                                echo $lista->tipo_genero;
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
                    <input type="text" name="direccion" placeholder="Ingresa tu Direccion" class="form-control" minlength="7" maxlength="30" required>
                    <label>Email</label><br>
                    <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo" minlength="12" maxlength="30" required>
                    <label>Usuario</label><br>
                    <input type="text" class="form-control" name="user" class="form-control" placeholder="Crea un Usuario"  minlength="3" maxlength="30" required>
                    <label>Contraseña</label><br>
                    <input type="password" name="pass" placeholder="Ingresa una Contraseña" id="cr1" class="form-control" maxlength="30" pattern=".{8,}" required>
                    <spam style="color: #9b9b9b; size: 5px; text-align: center;"> "La contraseña debe contener 8 caracteres"</spam><br> 
                    <label>Confirmar Contraseña</label><br>
                    <input type="password" name="confirmPass" placeholder="Confirma la Contraseña" id="cr2"  class="form-control" maxlength="30" pattern=".{8,}" >
                    <div class="file-select" id="src-file1" >        
                        <input type="file" name="foto" aria-label="Archivo">    
                    </div>
                    <div class="botonRecuperar">        
                                <button type="submit" class="botonCorto">Registrarse</button>
                    </div>
                </form>
			</div>
		</div>

        <script>
	        actualizarPaises()
	        actualizarBandera()
	        actualizarEstados()
	        actualizarCiudades()
			verificar()
			function verificar() {
				if ( $("#nombre-input").val().trim().length > 0 ) {
				alert("El campo contiene un string válido que no son espacios");
				}
				else {
				alert("El campo contiene espacios y está vacío");
				}
			}

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
	
			function valida_envia(){
				
				if(!verificarContrasena()){
					return false
				}
				if (document.fvalida.nombre.value.length==0){
						alert("Tiene que escribir su nombre")
						document.fvalida.nombre.focus()
						return false
				}
				if (document.fvalida.apellido.value.length==0){
						alert("Tiene que escribir sus apellidos")
						document.fvalida.apellido.focus()
						return false
				}
				if (document.fvalida.documento.value.length==0){
						alert("Falta por ingresar su documento")
						document.fvalida.documento.focus()
						return false
				}
				if (document.fvalida.celular.value.length==0){
						alert("Debe ingresar su numero de celular")
						document.fvalida.celular.focus()
						return false
				}
				if (document.fvalida.direccion.value.length==0){
						alert("Debe ingresar la direccion de su hogar")
						document.fvalida.direccion.focus()
						return false
				}
				if (document.fvalida.email.value.length==0){
						alert("Debe ingresar su correo electronico")
						document.fvalida.email.focus()
						return false
				}
				if (document.fvalida.user.value.length==0){
						alert("Falta por ingresar su usuario")
						document.fvalida.user.focus()
						return false
				}
				if (document.fvalida.pass.value.length==0){
						alert("Debe ingresar una contraseña")
						document.fvalida.pass.focus()
						return false
				}
				if (document.fvalida.confirmPass.value.length==0){
						alert("Debe confirmar la contraseña")
						document.fvalida.confirmPass.focus()
						return false
				}
			
				return true;
			}
		</script>
        @endsection