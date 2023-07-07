<?php

        $db ="mysql"; 
        $host ="localhost"; 
        $user="root"; 
        $password=""; 
        $dbname="sa";

         
            $mysqli = new mysqli( $host, $user, $password, $dbname);

if($mysqli->connect_errno)
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;


?>