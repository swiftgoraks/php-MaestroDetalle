<?php

// Connecting, selecting database
require_once 'conexion.php';

// Performing SQL query
$query = "SELECT id_receta,p.nombre || ' ' || p.apellido,fecha FROM receta r INNER JOIN persona p ON r.id_persona=p.id_persona ORDER BY id_receta;  ";
$result = pg_query($query) or   die('Query failed: ' . pg_last_error());

$query1 = "SELECT id_estado,estado FROM estado_civil ";
// Printing results in HTML
echo "<table class='table table-dark'>\n";
echo "<tbody>\n";
echo "<tr><td><b>ID Receta</td>
          <td><b>Persona</td>
          <td><b>Fecha</td>
          <td><b>Detalle</td>
          <td><b>eliminar</td></tr>";

while ($line = pg_fetch_array($result, null, PGSQL_NUM)) 
   {
    echo "\t<tr>\n";
    for ($i=0; $i<3; $i++) 
    {
        echo "\t\t<td><span id='$line[$i]' name='$line[$i]'>$line[$i]</span></td>\n";

    }
    echo "\t\t<td><button type='submit'  id='modal' name='modal' class='btn btn-primary'>Ver Detalle</button></td>\n";
    echo "\t\t<td><button type='submit' id='bteliminar' name='bteliminar' class='btn btn-danger'>Eliminar</button></td>\n";
    echo "\t</tr>\n";
}
echo "<tbody>\n";
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>
