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
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from contenido where id_documento=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['nombre_archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="archivos/<?php echo $datos['nombre_archivo']; ?>" style="width: 100%; height: 800px; border: none;" >></iframe>
                
                <?php } } ?>
    </body>
</html>
