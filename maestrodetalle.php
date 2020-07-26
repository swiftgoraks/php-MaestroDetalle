<?php
    require_once 'conexion.php';
    $id_receta =   $_GET['id_receta'];

    $query = "SELECT id_detalle_receta,medicamento,cantidad FROM detalle_receta d INNER JOIN medicamento m ON d.id_medicamento=m.id_medicamento WHERE id_receta=$id_receta ";
    $result = pg_query($query) or   die('Query failed: ' . pg_last_error());
    // Printing results in HTML
    echo "<input type='hidden' name='idreceta' id='idreceta' value='$id_receta'></input>";
    echo "<table class='table table-dark' id='tbmodal' name='tbmodal'>\n";
    echo "<tbody>\n";
    echo "<tr><td><b>ID</td>
          <td><b>Medicamento</td>
          <td><b>Cantidad</td>
          <td><b>Eliminar</td></tr>";

while ($line = pg_fetch_array($result, null, PGSQL_NUM)) 
    {
    echo "\t<tr>\n";
    for ($i=0; $i<3; $i++) 
    {
        echo "\t\t<td id=$line[$i]>$line[$i]</td>\n";
    }
    echo "\t\t<td><button type='button' id='eliminardetalle' name='eliminardetalle' class='btn btn-danger'>Eliminar</button></td>\n";
   
    echo "\t</tr>\n";
    }
    echo "<tbody>\n";
    echo "</table>\n";

    // Free resultset
    pg_free_result($result);

    // Closing connection
    pg_close($dbconn);
?>