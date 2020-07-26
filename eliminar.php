<?php
    try {
        $id_receta =   $_POST['id_receta'];
        require_once('conexion.php');
        $query = "DELETE FROM receta WHERE id_receta=$id_receta" or die (mysqli_error( $dbconn));

        $result=pg_query($dbconn,$query);

        if ($result == FALSE)
        {
            echo false;
        }
        else
        {
            echo true;
        }
        
    } catch (Exception $th) {
        echo $th->getMessage();
    }
    finally
    {

    // Free resultset
   // pg_free_result($result);

    // Closing connection
    pg_close($dbconn);
    }
   
?>