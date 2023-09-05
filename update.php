<?php

include("conexion_datos.php");
$con=conectar();

$RUT=$_POST['RUT'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$caso=$_POST['caso'];

$sql="UPDATE datos SET  nombre='$nombre',apellido='$apellido',caso='$caso' WHERE RUT='$RUT'";
$query=mysqli_query($con,$sql);

    if($query){
        echo "<script> alert('Cliente actulizado con exito'); window.location='about.php' </script>";
    }
?>