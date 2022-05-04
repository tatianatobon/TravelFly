<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/iniciarsesion', function () { 
    return view('inicioSesion');
});

Route::get('/registrarse', function () { 
    return view('registrarUsuario');
});

Route::post('/guardarusuario', function () { 
    foreach ($_REQUEST as $var => $val) {
        $$var=$val;
        }
    $resultado = DB::select("SELECT * FROM usuario WHERE documento = '$documento' OR email = '$email'");
    
    if (!empty($resultado)){
            alert("este usuario ya esta registrado");
            return view('/registrarse');
    }else{
        DB::table('usuario')->insert([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'documento' => $documento,
            'celular' => $celular,
            'fechaNacimiento' => $fechaNacimiento,
            'id_genero' => $id_genero,
            'pais' => $pais,
            'estado' => $estado,
            'ciudad' => $ciudad,
            'direccion' => $direccion,
            'email' => $email,
            'user' => $user,
            'pass' => $pass,
            'confirmPass' => $confirmPass,
            'foto' => '',
            'id_rol' => '3'
        ]);
    }
    die();
    return view('principal');
});

Route::post('/login', function (){
    session_start();
    $email=$_POST['email'];
	$pass=$_POST['pass'];
    $consulta_resultante = DB::select("SELECT * FROM usuario WHERE email='$email' AND pass='$pass'");
    if(!empty($consulta_resultante)){
        $_SESSION['id_rol'] = $consulta_resultante[0]->id_rol;
        switch ($_SESSION['id_rol']){
			case 1:
?>
                <script>
                    window.location.href="/menu-root";
                </script>
<?php
				break;
			case 2:
				return view('principal');
				break;
			case 3:
				return view('principal');
				break;			
			default:
				break;
		}
	}else{
		echo '<script language="javascript">alert("Error de autentificacion");
		window.location.href="/"</script>';
	}
    die();
});

Route::get('/menu-root', function () {
    return view('menuRoot');
});

Route::get('/salir', function (){
    session_start();
	session_destroy();
	echo "<script>alert('Hasta luego');</script>";
    ?>
    <script>
        window.location.href="/";
    </script>
    <?php
	exit();
});

Route::post('/eliminar-administrador', function () {
    foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}
    $deleted = DB::table('usuario')->where('id_usuario', '=', $id_usuario)->delete();
    die();
?>
    <script>
       window.location.href="/menu-root";
    </script>
<?php   
});

Route::post('/guardar-administrador', function() {
    foreach ($_REQUEST as $var => $val) {
        $$var=$val;
        }
        $resultado = DB::select("SELECT * FROM usuario WHERE documento = '$documento' OR email = '$email'");
        die();
        if (!empty($resultado)){
?>
            <script>
                window.alert("este usuario admin ¡ya existe!");
                window.location.href="/menu-root";
            </script>
<?php 
        }else{
            DB::table('usuario')->insert([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'documento' => $documento,
                'celular' => $celular,
                'pais' => $pais,
                'estado' => $estado,
                'ciudad' => $ciudad,
                'email' => $email,
                'pass' => $pass,
                'id_rol' => '2'
            ]);
?>
            <script>
                window.alert("Admin registado exitosamente");
                window.location.href="/menu-root";
            </script>
<?php 
        }	
});

Route::post('/editar-administrador', function() {
    foreach ($_REQUEST as $var => $val) {
        $$var=$val;
        }
        DB::table('users')->updateOrInsert(
        [
        'nombre' => $nombre,
        'apellido' => $apellido,
        'documento' => $documento,
        'celular' => $celular,
        'pais' => $pais,
        'estado' => $estado,
        'ciudad' => $ciudad,
        'email' => $email,
        'pass' => $pass,
        'id_rol' => '2'
        ]
    );
        die();	
});

Route::get('/recuperar-contrasena', function() {
    return view('recuperarContrasena');
});

Route::post('/recuperar', function() {
	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
    $usuario = DB::select("SELECT * FROM `usuario` WHERE `email` = '$correo'");
    if (sizeof($usuario) == 1){
        $enviarpass = $usuario[0]->pass;

        $paracorreo = $correo;
        $titulo = "Recuperar Contraseña";
        $mensaje = "Tu contraseña es: ".$enviarpass;
        $tucorreo = "From: travelfly.server@gmail.com";
        echo "<script> alert('Contraseña enviada'); window.location= '/' </script>";
        /* if(mail($paracorreo, $titulo, $mensaje, $tucorreo)){
            echo "<script> alert('Contraseña enviada'); window.location= 'inicio.html' </script>";
        }else{
            echo "<script> alert('Error'); window.location= 'inicio.html' </script>";
        } */
    }else{
        echo "<script> alert('Este correo no existe'); window.location= 'inicio.html' </script>";
    }
    die();
});

Route::get('/menu-admin', function (){
    return view('menuAdmin');
});