
<?php include_once('boostrap.html');

try {
    $mbd = new PDO('mysql:host=localhost;dbname=full_calendar', "root", "");
        $sth = $mbd->query('SELECT * FROM eventos');
    //echo "Conectado";

        } catch (PDOException $e) {
    //echo "No se conecto con la base de datos";
    }

?>

<!DOCTYPE html>

<html lang="en">    
<head>
<meta charset="UTF-8">
<title>Calendar</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<script src='assets/js/moment.min.js'></script>
<link rel='stylesheet' href='assets/css/fullcalendar.css' />
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/fullcalendar.js'></script>
<style>
    .Disponible{
        background-color: green;
        color: #ffffff;

    }

</style>


<body>
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6"><div>

        <div id='calendario'></div><div>

        <div class="col-md-3"></div>

    </div>
</div>

    <script language="JavaScript">
        $(document).ready(function() {
        $('#calendario').fullCalendar({
            locale: 'es',
            events:[
                <?php 
                    foreach($sth as$fila){
                    ?>
                {
                    id: "<?php echo $fila["id"];?>",
                    title: "<?php echo $fila["title"];?>",
                    start: "<?php echo $fila["start"];?>",
                    end: "<?php echo $fila["start"];?>",
                    editable: "<?php echo $fila["editable"];?>",
                    color: "<?php echo $fila["color"];?>",
                },

            <?php                         
                    }

                    ?>
            ],
            dayClick: function(date,jsEvent,view) {
                $("#exampleModal").modal("show");
                $("#fecha").val(date.format());
                //alert(date.format());
                //alert('coordenadas: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                //alert('Titulo de la vista: ' + view.title);
            },
            eventClick:function(calEvent,jsEvent,view){
                alert("EVENTO:  " + calEvent.title);
          
            }
        });

            
});

</script>
</head>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="descripcionEvento"></div>

        <form action="app/registrar.php" method="POST">

        <label for="">Fecha:</label>
        <input type="text" id="fecha" name="fecha"/>
        </br>
        <label for="">Evento</label>
        <input type="text" name="evento"/>
        </br>
        <label for="">Descripcion</label>
        <input type="text" name="descipcion"/>
        </br>
        <label for="">Hora Inicial</label>
        <input type="time" name="hora_inicial"/>
        </br>
        <label for="">Hora Final</label>
        <input type="time" name="hora_final"/>
        </br>
        <label for="">Color</label>
        <input type="color" name="color">

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit"class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
    
</html>
