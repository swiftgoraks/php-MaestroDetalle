<?php
    session_start();
    require_once 'funcion_injection.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['edad'];
    $estado = $_POST['estado'];
    
    if (strlen($fname) < 2) 
    {
        echo 'fname';
    } elseif (strlen($lname) < 2) 
    {
        echo 'lname';
    } 
    elseif (strlen($username) <= 4) 
    {
        echo 'ushort';
    } 
    elseif (strlen($edad) <1 || $edad <1) 
    {
        echo 'eshort';
    } 
    elseif (strlen($direccion) <= 4) 
    {
        echo 'dshort';
    } 
    elseif (strlen($password) <= 4) 
    {
        echo 'pshort';
    } 
    else if (injection($fname))
    {
       graficar();
    }
    else if (injection($lname))
    {
       graficar();
    }
    else if (injection($username))
    {
       graficar();
    }
    else if (injection($password))
    {
       graficar();
    }
    else if (injection($direccion))
    {
       graficar();
    }
    else 
    {
        require_once 'conexion.php';
        //password encrypt hash
        $semilla1='>Nv+m4\V5X';
        $semilla2='b8,MC5+$:;';
        $spassword=md5(sha1(md5($semilla1.$password.$semilla2)));
        
       
        $query = "SELECT * FROM persona WHERE username='$username'";
        $result = pg_query($dbconn, $query) or die(mysqli_error());
        $num_row = pg_num_rows($result);
        $row = pg_fetch_array($result);

        if ($num_row < 1) {

            $query1 = "INSERT INTO persona ( nombre, apellido, edad, direccion,id_estado,pass,username) VALUES ('$fname', '$lname', $edad, '$direccion', $estado, '$spassword','$username')" or die (mysqli_error( $dbconn));
            $result1=pg_query($dbconn,$query1);
            $insert_row=pg_affected_rows($result1);
            pg_free_result($result1);
            //$insert_row =   $dbconn->prepare("INSERT INTO persona ( nombre, apellido, edad, direccion,id_estado,pass,username) VALUES (?,?,?,?,?,?)");
            //$insert_row ->bindParam($fname, $lname, $edad, $direccion, $id_estado, $pass);
            //$insert_row->execute();
         
            if  ($insert_row)
            {
                $_SESSION['username']  =   $username;
                echo true;
            }
    
        } 
        else
        {
			echo false;
        }
         // Closing connection
        pg_close($dbconn);
    }
?>