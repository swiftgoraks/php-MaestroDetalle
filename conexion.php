
<?php

    try {

        $dbconn = pg_connect("host=127.0.0.1 
        dbname=emergentes user=postgres  
        password=admin");
        
        return $dbconn;

        
    } catch (Exception $th) {
        echo $th->getMessage();
    }
?>