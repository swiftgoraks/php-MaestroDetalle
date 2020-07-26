<?php

// Connecting, selecting database
require_once 'conexion.php';

// Performing SQL query
$query = "SELECT id_persona, nombre, apellido, edad, direccion, id_estado FROM persona ORDER BY id_persona ";
$result = pg_query($query) or   die('Query failed: ' . pg_last_error());

$query1 = "SELECT id_estado,estado FROM estado_civil ";
// Printing results in HTML
echo "<table class='table table-dark'>\n";
echo "<tbody>\n";
echo "<tr><td><b>ID</td>
          <td><b>nombre</td>
          <td><b>apellido</td>
          <td><b>edad</td>
          <td><b>direccion</td>
          <td><b>estado</td>
          <td><b>editar</td></tr>";

while ($line = pg_fetch_array($result, null, PGSQL_NUM)) 
   {
    echo "\t<tr>\n";
    for ($i=0; $i<6; $i++) 
    {
      if($i==0) 
      {
        echo "\t\t<td><span id='idP' name='idP'>$line[$i]</span></td>\n";
      }
      else if ($i==3)
      {
        echo "\t\t<td><input type='number' value='$line[$i]' id='edad' name='edad'></input></td>\n";
      }
      else if ($i==4)
      {
        echo "\t\t<td><input type='text' value='$line[$i]' id='direccion' name='direccion'></input></td>\n";
      }
      else if($i==5)
      {
        
        $result1 = pg_query($query1) or   die('Query failed: ' . pg_last_error());

        echo "\t\t<td><select id='estadoCivil' name='estadoCivil'>";
        while ($rows = pg_fetch_array($result1)) 
        {
          if($rows['id_estado']==$line[$i])
          {
            echo "<option value=".$rows['id_estado']." selected='selected'>".$rows['estado'] ."</option>";
          }
          else
          {
            echo "<option value=".$rows['id_estado']." >".$rows['estado']."</option>";
          }
        }
        "</select>
        </td>\n";
        
      }
      else 
      {
        echo "\t\t<td>$line[$i]</td>\n";
      }
      
    }
    echo "\t\t<td><button type='submit' id='editar' name='editar' class='btn btn-primary'>Editar</button></td>\n";
    echo "\t</tr>\n";
}
echo "<tbody>\n";
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>