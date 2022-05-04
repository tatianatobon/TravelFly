@extends('layouts.navegador')

@section('content')
<?php
    session_start();

    if(!isset($_SESSION['id_rol'])){
?>
        <script>
            window.location.href="/iniciarsesion";
        </script>
<?php  
        
    }else{
        if ($_SESSION['id_rol'] != 2){
?>
        <script>
            window.location.href="/menu-admin";
        </script>
<?php  
        }
    }
?>


@endsection