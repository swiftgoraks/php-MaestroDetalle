<?php
    require_once 'funcion_injection.php';
    $id_persona =   $_POST['id_persona'];
    $edad =   $_POST['edad'];
    $direccion =   $_POST['direccion'];
    $id_estado  =   $_POST['id_estado'];

    require_once 'conexion.php';

    if (injection($direccion)) 
    {
        graficar();
    }
    else
    {
        $query = "UPDATE persona SET edad=".$edad.", direccion='".$direccion."', id_estado=".$id_estado." WHERE id_persona=".$id_persona."" or die (mysqli_error( $dbconn));

        $result=pg_query($dbconn,$query);
        // Free resultset
        pg_free_result($result);
    }
    // Closing connection
    pg_close($dbconn);
?>