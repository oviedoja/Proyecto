
<?php include_once('boostrap.html');
    //include("subir.php");
    include("conexion_datos.php");
    $con=conectar();

    $sql="SELECT *  FROM datos";
    $query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ingresa tus Datos</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresa tus Datos</title>
</head>
<body>
    <div class="container mt-5">
            <div class="row">

                <div class="col-md-3">
                    <h1>Ingrese Datos</h1>
                    <form action="insertar.php" method="POST">
                        <input type="text" class="form-control mb-3" name="RUT" placeholder="RUT">
                        <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                        <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido">
                        <input type="text" class="form-control mb-3" name="caso" placeholder="Tipo de Caso">
                        <tr>
                        <input type="submit" class="btn btn-primary" >
                    </form>

                </div>

                <div class="col-md-8">
                    <table class="table">
                        <thread class="table-succes table-striped">
                            <tr>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo de Caso</th>
                            </tr>

                        </thread>
                        <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <th><?php echo $row['RUT']?></th>
                                    <th><?php echo $row['nombre']?></th>
                                    <th><?php echo $row['apellido']?></th>
                                    <th><?php echo $row['caso']?></th>
                                    <th><a href="actualizar.php?id=<?php echo $row['RUT'] ?>" class="btn btn-info">&#x270f;&#xfe0f;</a></th>
                                    <th><a href="borrar.php?id=<?php echo $row['RUT'] ?>" class="btn btn-danger">&#128465;</a></th>
                                </tr>
                                <?php
                                  }
                                ?>
                        </tbody>
                    </table>
                </div>

            </div> 

        </div>          

    </body>
</html>

