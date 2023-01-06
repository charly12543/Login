<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","1234","proyecto");

$_consulta="SELECT*FROM usuarios where usuario = '$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$_consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:cargar_imagen.html");

}else
if($filas['id_cargo']==2) {
    header("location:registrar.html");

}else
{

    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php

}

mysqli_free_result($resultado);
mysqli_close($conexion);
 



