<?php
    include_once 'boostrap.html';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <div class="container mt-5">
    <div class="row">
        <table>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <!--<th>Tamaño</th>-->
                <th>Tipo</th>
                <th>Nombre</th>
            </tr>
    </div>
    </div>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "SELECT * from contenido";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>
                <td><?php echo $datos['titulo']; ?></td>
                <td><?php echo $datos['descripcion']; ?></td>
                <!--<td><?//php echo $datos['tamanio']; ?></td>-->
                <td><?php echo $datos['tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
            </tr>
                
          <?php  } ?>
            
        </table>
    </body>
</html>
