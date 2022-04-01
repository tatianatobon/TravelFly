<?php

class Consulta_registro
{
    /* constructor de la clase */
    function __construct(){

    }
    /* funcion para consulta de los paises */
    function paises(){
        include ('conexion.php');
        $consulta="SELECT * FROM pais WHERE 1";
	    $resultado=mysqli_query($enlace, $consulta);
        for($i = 0; $i <= $resultado->num_rows; $i++){
            $row[$i] = mysqli_fetch_array($resultado);
            unset($row[$i][0]);
            unset($row[$i][1]);
        }
        mysqli_close($enlace);
        return $row;
    }

    /* funcion para consulta de los estados o departamentos*/
    function departamentos($id){
        include ('conexion.php');
        $consulta="SELECT * FROM estado WHERE `IdPais` = $id";
	    $resultado=mysqli_query($enlace, $consulta);
        for($i = 0; $i <= $resultado->num_rows; $i++){
            $row[$i] = mysqli_fetch_array($resultado);
            unset($row[$i][0]);
            unset($row[$i][1]);
            unset($row[$i][2]);
        }
        mysqli_close($enlace);
        return $row;
    }

}