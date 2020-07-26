<!doctype html>
<html >
  <head>
    <!-- Bootstrap CSS -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Emergentes</title>


    <!-- Script -->
	<script type="text/javascript">
        $(document).ready(function () {

            $(".table tbody").on('click','#editar',function(){

                let currentrow  = $(this).closest('tr'); //obtiene la fila
                let id_persona  = currentrow.find('td:eq(0)').text();
                let edad  = currentrow.find('#edad').val();
                let direccion = currentrow.find('#direccion').val();
                let id_estado = currentrow.find('#estadoCivil').val();
                $.ajax({
                    type: "POST",
                    url: "editar.php",
                    data: "id_persona=" + id_persona + "&edad=" + edad + "&direccion=" + direccion + "&id_estado=" + id_estado ,
                    success: function (html) {
                        if (html == 'true') {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Account</strong> processed. \ \
                                                 </div>');

                            window.location.href = "index.php";
                        } 
                        else 
                        {
                            $("#add_err2").html(html);
                        }
                    },
                    beforeSend: function () {
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
            });           
        });
    </script>
  </head>
  <body>
    <?php require_once 'nav.php'; ?>
    <?php require_once 'persona.php'; ?>
    <div id="add_err2"></div>
    <?php require_once 'footer.php'; ?>  
  </body>


  </html>
