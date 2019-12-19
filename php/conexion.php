<?php 
    //$conn_string = "host=10.0.10.62 port=5433 dbname=apmt user=postgres password=postgres";
    $conn_string = "host=localhost 
port=5432 
dbname=prueba 
user=postgres 
password=postgres";
    $dbconn = pg_connect($conn_string);
?>

