<?php
session_start();
require_once 'conexion.php';
require_once 'funcion_injection.php';
$tAlias= $_POST["tAlias"];
$tClave= $_POST["tClave"];
$semilla1='>Nv+m4\V5X';
$semilla2='b8,MC5+$:;';

  if (injection($tAlias)) 
  {
    graficar();
  }
  else if (injection($tClave))
  {
    graficar();
  }
  else
  {
    $tClave=md5(sha1(md5($semilla1.$tClave.$semilla2)));
    $query = "SELECT * FROM persona WHERE username='$tAlias' AND pass='$tClave'";
    $result = pg_query($dbconn, $query) or die(pg_error());
    $num_row = pg_num_rows($result);
    $row = pg_fetch_array($result);
  
    if ($num_row >= 1) {
      $_SESSION['w3xSY8']  =   $tAlias;
      header("location:indexmaestrodetalle.php");
    }
    else 
    {
      unset($_SESSION['w3xSY8']);
      session_destroy();
      header("location:login.php");
    }
      // Free resultset
      pg_free_result($result);
  }
  // Closing connection
  pg_close($dbconn);
?>
