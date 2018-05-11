<?php

    require_once "../db.conf";

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }

    $query = "UPDATE UserData SET username='$_POST[username]' where id=$_POST[id]";
    
    $mysqli->query($query);



    $mysqli->close();
    header("Location: https://lz7fd.epizy.com/CS3380FinalProject/FinalProject/userdata.php");
?>