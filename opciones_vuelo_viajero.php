<!DOCTYPE html>
<html>
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
</head>

<body>
		<div>
            <nav class="navbar navbar-inverse navbar-dark bg-primary">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"></a>
                    </div>
                    <div class="navbar-nav mr-auto">
                        <a href="inicio.html" style="color: #FFFFFF;">volver <i class="bi bi-box-arrow-right"></i></a>
                    </div>
                </div>   
            </nav>
        </div>

		<div class="contenedorCuadro col-sm-12 col-lg-3">

		<b>
          <center>
          <div style="border: solid; border-radius: 10px; border-color: #85929E; margin-bottom: 5px; padding: 10px;">
            <div class="contenedorCuadro col-sm-12 col-lg-3">
              <p style="text-align: center;"><img src="img/Logotipo.png" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
              <h2 style="text-align: center;">Gestiona tu Vuelo</h2><br>
              <h5 style="text-align: center;">Realiza Tu Check-in o cambio de silla en digital. Recuerda tienes desde 48 a 3 horas antes de vuelos Internacionales o 2 horas antes para vuelos Nacionales</h5><br>
              <div class="contenedorFormulario">
                <center>
                  <a href="#?codVuelo=<?php echo $fila['codVuelo']; ?>?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><button type="button" class="btn btn-success"><i class="bi bi-clipboard2-check-fill"></i> Check-In</button></a><br><br>
                  <a href="#?codVuelo=<?php echo $fila['codVuelo']; ?>?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><button type="button" class="btn btn-danger"><i class="bi bi-pin-fill"></i> Cambio de Silla</button></a><br><br>
                  </center>
              </div>                                                      
            </div>
          </div>
          </center>
        </b>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>