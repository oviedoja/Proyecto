<?php
    //echo "Estas en el archivo registrar.php";
    
    //var_dump($_POST);
    //echo $_POST['fecha'];

    $fecha=$_POST['fecha'];
    $evento=$_POST['evento'];
    $hora_incial=$_POST['hora_inicial'];
    $hora_final=$_POST['hora_final'];
    $color=$_POST['color'];

    //var_dump($fecha,$evento,$hora_incial,$hora_final,$color);
    $datos=array(
        "title" => $evento,
        "start" => $fecha." ".$hora_incial,
        "end"   => $fecha." ".$hora_final,
        "color" => $color 
    );

    //var_dump($datos);

    try{
    $conneccion=new PDO('mysql:host=localhost;dbname=full_calendar', "root", "");
    $cadena_consulta="insert into eventos(title, start, end, color) value(:title, :start, :end, :color)";
    $consulta=$conneccion->prepare($cadena_consulta);
    $consulta -> execute($datos);

        //echo "CONECTADO";
    }catch(PDOException $e){
        //echo "NO CONECTADO";
        //echo $e;
    }

    header("location: http://localhost/tesis/calendar.php") 

?>