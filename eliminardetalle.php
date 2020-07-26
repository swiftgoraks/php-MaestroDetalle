<?php
    try {
        $id_detalle_receta =   $_POST['id_detalle_receta'];
        $id_receta =   $_POST['id_receta'];
        require_once('conexion.php');
        $query = "DELETE FROM detalle_receta WHERE id_detalle_receta=$id_detalle_receta" or die (mysqli_error( $dbconn));
       
        $result=pg_query($dbconn,$query);

        if ($result == TRUE)
        {
           
            $query1 = "SELECT * FROM detalle_receta WHERE id_receta=$id_receta ";
            $result1 = pg_query($query1) or   die('Query failed: ' . pg_last_error());
            if(pg_num_rows($result1)==0)
            {
                $query2 = "DELETE FROM receta WHERE id_receta=$id_receta" or die (mysqli_error( $dbconn));
                $result2=pg_query($dbconn,$query2);
                pg_free_result($result2);
                echo false;
            }
            else
            {
                echo true;
            }
        }
        
    } catch (Exception $th) {
        echo $th->getMessage();
    }
    finally
    {

    // Free resultset
    pg_free_result($result);
    pg_free_result($result1);
   
    // Closing connection
    pg_close($dbconn);
    }
   
?>