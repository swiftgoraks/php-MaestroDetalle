<?php
    session_start();

    if(isset($_SESSION['w3xSY8']))
    {
        $w3xSY8 =   $_SESSION['w3xSY8'];
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Emergentes</title>

    <!-- Script -->
	<script type="text/javascript">
        $(document).ready(function () {

            $(".table tbody").on('click','#bteliminar',function(){

                let currentrow  = $(this).closest('tr');
                let id_receta  = currentrow.find('td:eq(0)').text();
                $.ajax({
                    type: "POST",
                    url: "eliminar.php",
                    data: "id_receta=" + id_receta ,
                    success: function (html) {
                        if (html == true) 
                        {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Se ha eliminado</strong> \ \
                                                 </div>');

                            window.location.href = "indexmaestrodetalle.php";
                        } 
                        else if (html==false)
                        {
                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Error al eliminar.</strong> \ \
                                                </div>');
                        }
                        else
                        {
                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Error al eliminar.</strong> \ \
                                                </div>');
                           //$("#add_err2").html(html);
                        }
                       
                    },
                    beforeSend: function () {
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
            });

            $(".table tbody").on('click','#modal',function(){
                
                let currentrow  = $(this).closest('tr');
                let id_receta  = currentrow.find('td:eq(0)').text();
                let paciente   =currentrow.find('td:eq(1)').text();
                let fecha   =currentrow.find('td:eq(2)').text();
                $.ajax({
                    type: "GET",
                    url: "maestrodetalle.php",
                    data: "id_receta=" + id_receta ,
                    success: function (html) {
                        $('#myModalLabel').html("Detalle Receta del paciente: "+paciente+" fecha : "+fecha);
                        $('.modal-body').load("maestrodetalle.php?id_receta="+id_receta,function(){
                            //alert(id_receta);
                            $('#myModal').modal({show:true});
                        });
                       
                    },
                    
                });
            });
            return false;
        });   
    </script>

<script type="text/javascript">

$(document).ready(function(){
    $(document).on('click','button[type=submit]',function(e){
        $(".modal-body").on('click','#eliminardetalle',function(){
            let currentrow  = $(this).closest('tr');
            let id_detalle_receta  = currentrow.find('td:eq(0)').text();
            let id_receta   =    $("#idreceta").val();
            $.ajax({
                type: "POST",
                url: "eliminardetalle.php",
                data: "id_detalle_receta=" + id_detalle_receta +"&id_receta=" + id_receta ,
                success: function (html) {
                    if(html==true)
                    {
                        for (let index = 0; index < 4; index++) {
                            currentrow.find("td:eq(0)").remove();
                        }
                    }
                    else if(html==false)
                    {
                        for (let index = 0; index < 4; index++) {
                            currentrow.find("td:eq(0)").remove();
                        }
                        //location.reload();
                    }
                },
            });
        });

        $('#btModalClose').click(function(){
            location.reload();
        }); 
        $('#spanModalClose').click(function(){
            location.reload();
        }); 
    });
});

</script>

  </head>
  <body>
  <?php require_once 'nav.php'; ?>  

  <h2 class="text-center">
    Bienvenido <?php echo $w3xSY8 ?> - 
    <a href="logout.php">Cerrar Sesion</a>
  </h2>

  <?php 
  require_once 'tablarecetas.php';
  ?>
 <div id="add_err2"></div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" name="myModalLabel">Detalle Receta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="spanModalClose" ><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
               
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btModalClose">Cerrar</button>
                </div>

            </div><!-- modal content -->
        </div><!-- modal dialog -->
    </div><!-- modal fade -->
<!-- Cierra Modal -->
<?php require_once 'footer.php'; ?>  
  </body>
  </html>
  <?php
    }
    else
    {
        header("location:login.php");
    }
?>

