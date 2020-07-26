<!DOCTYPE html>
<html>

<head>
    <title>Ingresar usuario</title>

    <!-- Bootstrap CSS -->
    
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
	<!-- Script -->
	<script type="text/javascript">
        $(document).ready(function () {

            $("#register").click(function () {

                let fname = $("#fname").val();
                let lname = $("#lname").val();
                let username = $("#username").val();
                let edad =  $("#edad").val();
                let password = $("#password").val();
                let direccion   =   $("#direccion").val();
                let estado  =   $('input:radio[name=optradio]:checked').val();
                
                $.ajax({
                    type: "POST",
                    url: "adduser.php",
                    data: "fname=" + fname + "&lname=" + lname + "&username=" + username + "&edad=" + edad + "&password=" + password+ "&direccion=" + direccion+ "&estado=" + estado,
                    success: function (html) {
                        if (html == true) {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Se creo</strong> . \ \
                                                 </div>');

                            window.location.href = "indexmaestrodetalle.php";

                        } else if (html == false) {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Usuario</strong> existente (username en uso). \ \
                                                 </div>');                    

                        } else if (html == "fname") {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Nombre</strong> es requerido. \ \
                                                 </div>');
												 
						} else if (html == 'lname') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Apellido</strong> es requerido. \ \
                                                 </div>');

                        } else if (html == 'dshort') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Direccion</strong> es requerido. \ \
                                                 </div>');

                        } else if (html == 'eshort') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Edad</strong> es requerido. \ \
                                                 </div>');
												 
						}
                        else if (html == 'ushort') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Username</strong> es requerido. \ \
                                                 </div>');
												 
						} else if (html == 'pshort') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Password</strong> debe tener mas de 4 characters . \ \
                                                 </div>');

                        } else {
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
    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                    <strong>Registration form</strong>
                        
                    </h2>
					<div id="add_err2"></div>
                    <hr>       
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Nombre</label>
                                <input type="text" id="fname" require='true'name="fname" maxlength="25" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Apellido</label>
                                <input type="text" id="lname" name="lname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Username</label>
                                <input type="text" id="username" name="username" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Edad</label>
                                <input type="number" id="edad" name="edad" maxlength="25" class="form-control" value="1"></input>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Direccion</label>
                                <input type="text" id="direccion" name="direccion" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Contraseña</label>
                                <input type="password" id="password" name="password" maxlength="10" class="form-control">
                            </div>
                            
                            <div class="form-group col-lg-12" id="rdform">
                                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" checked value="1">Soltero</label>
                                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="2">Casado</label>
                                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="3">Divorciado</label>
                            </div>

                            <div class="form-group col-lg-12">
                                <button type="submit" id="register" class="btn btn-primary" >Crear Usuario</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    <?php require_once 'footer.php'; ?>  
</body>

</html>
