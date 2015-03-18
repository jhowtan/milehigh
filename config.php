<?php
    // DO NOT COMMIT CHANGES TO THIS FILE
    $db_user = "root"; // note different users for development and production
    $db_pass = "password"; // note different passwords for your user
    $db_host = "localhost"; // on development use localhost:8889
    $db_name = "cs2102";
    
    //connection to server
    $dbhandle = mysql_connect($db_host, $db_user, $db_pass)
      or die("Unable to connect to MySQL");
    
    // connect to database
    $db = mysql_select_db($db_name, $dbhandle)
      or die("Unable to select " + $db_name);
?>
