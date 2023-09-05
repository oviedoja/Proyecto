<?php
    include("conexion_datos.php");
    $con=conectar();

$RUT=$_POST['RUT'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$caso=$_POST['caso'];

if(!empty($RUT) && !empty($nombre) && !empty($apellido) && !empty($caso)){
    $sql="INSERT INTO datos VALUES('$RUT','$nombre','$apellido','$caso')";
    $query= mysqli_query($con,$sql);
        echo "<script> alert('Cliente ingresado con exito'); window.location='about.php' </script>";
    } 
    else{
        echo "<script> alert('Ingrese todos los datos'); window.location='about.php' </script>";
    }  


//$sql="INSERT INTO datos VALUES('$RUT','$nombre','$apellido','$caso')";
//$query= mysqli_query($con,$sql);
?>