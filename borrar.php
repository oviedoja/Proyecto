<?php
   include("conexion_datos.php");
   $con=conectar();


$RUT=$_GET['id'];

$sql="DELETE FROM datos  WHERE RUT='$RUT'";
$query=mysqli_query($con,$sql);

    if($query){
        echo "<script> alert('Cliente eliminado con exito'); window.location='about.php' </script>";
    }
?>